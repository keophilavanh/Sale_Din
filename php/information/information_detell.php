<?php  
 //fetch.php  
 include_once('../conn.php'); 
 session_start();
 $price=0;
 $image_list='';
 $sli='';
 if(isset($_POST["information_id"]))  
 {  
        

      $query = "SELECT * FROM information WHERE id = '".$_POST["information_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result); 
      
   
    


      if($_SESSION['language'] == 'EN'){
  
          $output = array(
               
               'titel' =>  $row['titel_EN'],
               'date' => date("d-m-Y", strtotime($row['date'])),
               'description' => $row['Description_EN'],
               'image' =>  './php/information/'.$row['image'] 
              
              
               );
      
        }else{

          $output = array(
              
                'titel' =>  $row['titel_LA'],
                'date' => date("d-m-Y", strtotime($row['date'])),
                'description' => $row['Description_LA'],
                'image' => './php/information/'.$row['image'] 
           
               );

        }

     
      echo json_encode($output);  

     
     //  echo json_encode($row);  
 }  
 ?>