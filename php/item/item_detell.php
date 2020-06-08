<?php  
 //fetch.php  
 include_once('../conn.php'); 
 session_start();
 $price=0;
 $image_list='';
 $sli='';
 if(isset($_POST["product_id"]))  
 {  

      $query_image = "SELECT * FROM image WHERE pro_id = '".$_POST["product_id"]."'";  
      $result_image = mysqli_query($connect, $query_image);  
      $total_count = mysqli_num_rows(mysqli_query($connect, $query_image));


      if($total_count > 0){

               $i = 0;
               while( $row_image = mysqli_fetch_array($result_image)){
                    if($i == 0){
                         $sli.= '
                              

                              <div class="carousel-item active">
                                   <img class="d-block w-100" src="php/'.$row_image['part'].$row_image['name'].'" alt="First slide">
                              </div>
                                   ';  
                    }else{
                         $sli.= '
                             

                              <div class="carousel-item">
                                  <img class="d-block w-100" src="php/'.$row_image['part'].$row_image['name'].'" alt="Second slide">
                               </div>
                                   ';  
                    }
                    
                    $i++;
               }

      }else{
          $sli.= '

          <div class="carousel-item active">
                    <img class="d-block w-100" src="http://via.placeholder.com/300x300" alt="First slide">
          </div>

         
               ';  
      }

            



     $image_list=' <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                          <div class="carousel-inner">

                            '.$sli.'

                         </div>
                         <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                         </a>
                         <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                         </a>
                    </div>';

    

    

                 

      $query = "SELECT * FROM product WHERE id = '".$_POST["product_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result); 
      
      $query_view = "UPDATE `product` SET `view`=".++$row['view']." WHERE id = '".$_POST["product_id"]."'";  
      mysqli_query($connect, $query_view);

      if($_POST['currency']=='KIP'){
          $price = number_format($row['Price_KIP']).' KIP';
      }else if($_POST['currency']=='THB'){
          $price = number_format($row['Price_THB']).' THB';
      }else{
          $price = number_format($row['Price_USD']).' USD';
      }


      if($_SESSION['language'] == 'EN'){
  
          $output = array(
               'price' => $price,
               'titel' =>  $row['Name_EN'],
               'localtion' => $row['Localtion_EN'],
               'description' => $row['Description_EN'],
               'image_list' =>  $image_list,
               'vendor' =>  $row['user_id'],
              
               );
      
        }else{

          $output = array(
               'price' => $price,
               'titel' =>  $row['Name_LA'],
               'localtion' => $row['Localtion_LA'],
               'description' => $row['Description_LA'],
               'image_list' =>  $image_list,
               'vendor' =>  $row['user_id'],
               );

        }

     
      echo json_encode($output);  

     
     //  echo json_encode($row);  
 }  
 ?>