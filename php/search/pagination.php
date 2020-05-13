<?php
    include_once('../conn.php');
    include_once("function.php");

    session_start();
 
 

    function select_image($id)
    {
       


        return $image;
    }

    if (isset($_POST['page'])) {
        $pageno = $_POST['page'];
    } else {
        $pageno = 1;
    }

    

 

    // if($_POST['keyword']){
    //     echo $_POST['keyword'] .'/
    //     '; 
    // }

    if ($_POST['keyword'] || $_POST["price_min"] > 0 || $_POST["price_max"] > 0 ) {

       

        $where = 'WHERE ';

        if($_POST['keyword']){
             
            $where .= '   (  product.Name_LA LIKE "%'.$_POST["keyword"].'%"
                            OR product.Name_EN LIKE "%'.$_POST["keyword"].'%"
                            OR product.Description_LA LIKE "%'.$_POST["keyword"].'%"
                            OR product.Description_EN LIKE "%'.$_POST["keyword"].'%"
                            OR product.Localtion_LA LIKE "%'.$_POST["keyword"].'%"
                            OR product.Localtion_EN LIKE "%'.$_POST["keyword"].'%" )';

                            if($_POST['currency']=='KIP'){
              
                                if($_POST["price_min"] > 0){
                                    $where.=' AND product.Price_KIP >= '.$_POST["price_min"].' ';
                                }
                    
                                if($_POST["price_max"] > 0){
                                    $where.=' AND product.Price_KIP <= '.$_POST["price_max"].' ';
                                }
                        
                    
                            }else if($_POST['currency']=='THB'){
                    
                                if($_POST["price_min"] > 0){
                                    $where.=' AND product.Price_THB >= '.$_POST["price_min"].' ';
                                }
                    
                                if($_POST["price_max"] > 0){
                                    $where.=' AND product.Price_THB <= '.$_POST["price_max"].' ';
                                }
                    
                            }else{
                                
                                if($_POST["price_min"] > 0){
                                    $where.=' AND product.Price_USD >= '.$_POST["price_min"].' ';
                                }
                    
                                if($_POST["price_max"] > 0){
                                    $where.=' AND product.Price_USD <= '.$_POST["price_max"].' ';
                                }
                    
                    
                            }

        }else{

            if($_POST['currency']=='KIP'){
              
                if($_POST["price_min"] > 0){
                    $where.='  product.Price_KIP >= '.$_POST["price_min"].' ';
                }
    
                if($_POST["price_max"] > 0){
                    $where.=' AND product.Price_KIP <= '.$_POST["price_max"].' ';
                }
        
    
            }else if($_POST['currency']=='THB'){
    
                if($_POST["price_min"] > 0){
                    $where.='  product.Price_THB >= '.$_POST["price_min"].' ';
                }
    
                if($_POST["price_max"] > 0){
                    $where.=' AND product.Price_THB <= '.$_POST["price_max"].' ';
                }
    
            }else{
                
                if($_POST["price_min"] > 0){
                    $where.='  product.Price_USD >= '.$_POST["price_min"].' ';
                }
    
                if($_POST["price_max"] > 0){
                    $where.=' AND product.Price_USD <= '.$_POST["price_max"].' ';
                }
    
    
            }

        }
       
        
        

    } else {
        $where = '';
    }




    $no_of_records_per_page = 12;
    $offset = ($pageno-1) * $no_of_records_per_page;

    

    $total_pages_sql = "SELECT COUNT(*) FROM product JOIN category ON product.cat_id = category.cat_id $where";

    //echo $total_pages_sql;
    $sql = "SELECT * FROM product JOIN category ON product.cat_id = category.cat_id $where LIMIT $offset, $no_of_records_per_page";

    $result = mysqli_query($connect,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);

   
    $res_data = mysqli_query($connect,$sql);
    $price;
    $item_list = '';
    while($row = mysqli_fetch_array($res_data)){
         
        //  $item_list .= '  <div class="col-sm-3 p-3 item_detell" id="'.$row['id'].'">
        //                     <div class=" box item " >
        //                         <div class="ribbon"><span>'.$row['id'].'</span></div>
        //                         <img class="card-img-top" src="https://s3-ap-southeast-1.amazonaws.com/yula/public/listing/2020/03/26/AujEAEHzZa7aJhu5lD0SKbytiUZLr2MNGscIyMK2.jpeg" width="150" height="180" alt="Card image cap">
        //                         <div class="card-body">
        //                             <h5 class="card-title"><i class="fas fa-dollar-sign"></i> 1,500,000 ໂດລາ</h5>
        //                             <p class="card-title"><i class="fas fa-tag"></i> ດິນປູກສ້າງ</p>
        //                             <p class="card-text"><i class="fas fa-map-marker-alt"></i> ບ້ານ ໂພນປາເປົ້າ ເມືອງສີສັດຕະນາກ ນະຄອນຫຼວງວຽງຈັນ</p>
                                
        //                         </div>
                                
        //                     </div>

        //                 </div>';

        $image='';
        $sql_image = "SELECT * FROM `image` WHERE pro_id=".$row['id']." LIMIT 1";
        $result_image = mysqli_fetch_array(mysqli_query($connect,$sql_image));
        if($result_image['name']){
            $image='php/'.$result_image['part'].$result_image['name'];
        }else{
            $image='http://via.placeholder.com/150x180';
        }

       

        if($_SESSION['language'] == 'EN'){

            if($_POST['currency']=='KIP'){
                $price = number_format($row['Price_KIP']).' KIP';
            }else if($_POST['currency']=='THB'){
                $price = number_format($row['Price_THB']).' THB';
            }else{
                $price = number_format($row['Price_USD']).' USD';
            }
  
            $item_list .= '  <div class="col-sm-3 p-3 item_detell" id="'.$row['id'].'">
                                <div class=" box item " >
                                    <div class="ribbon"></div>
                                    <img class="card-img-top" src="'.$image.'" width="150" height="180" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><i class="fas fa-dollar-sign"></i> '.$price.'</h5>
                                        <p class="card-title"><i class="fas fa-tag"></i> '.$row['Name_EN'].'</p>
                                        <p class="card-text"><i class="fas fa-map-marker-alt"></i> '.$row['Localtion_EN'].'</p>
                                    
                                    </div>
                                    
                                </div>

                            </div>';
        
          }else{

            if($_POST['currency']=='KIP'){
                $price = number_format($row['Price_KIP']).' ກີບ';
            }else if($_POST['currency']=='THB'){
                $price = number_format($row['Price_THB']).' ບາດ';
            }else{
                $price = number_format($row['Price_USD']).' ໂດລາ';
            }

            $item_list .= '  <div class="col-sm-3 p-3 item_detell" id="'.$row['id'].'">
                                <div class=" box item " >
                                    <div class="ribbon"></div>
                                    <img class="card-img-top" src="'.$image.'" width="150" height="180" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><i class="fas fa-dollar-sign"></i> '.$price.'</h5>
                                        <p class="card-title"><i class="fas fa-tag"></i> '.$row['Name_LA'].'</p>
                                        <p class="card-text"><i class="fas fa-map-marker-alt"></i> '.$row['Localtion_LA'].'</p>
                                    
                                    </div>
                                    
                                </div>

                            </div>';

          }

        
    }


    

    $output = array(
        'status' => 'ok',
        'itemlist' =>   $item_list,
        //'sql' => $total_pages_sql,
        'total_rows' =>   $total_rows,
        'pagination' => pagination($total_rows,$no_of_records_per_page,$pageno,'search_page.php?',$_POST['url_search'],$_POST['price_min'],$_POST['price_max'])
       
        );
    echo json_encode($output);  
    

?>