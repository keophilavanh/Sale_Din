<?php
    include_once('../../conn.php');
    include_once("function.php");

    session_start();
 
 

   

    if (isset($_POST['page'])) {
        $pageno = $_POST['page'];
    } else {
        $pageno = 1;
    }

  

  





    $no_of_records_per_page = 4;
    $offset = ($pageno-1) * $no_of_records_per_page;

    

    $total_pages_sql = "SELECT COUNT(*) FROM information ";

   
    $sql = "SELECT * FROM information  LIMIT $offset, $no_of_records_per_page";

    $result = mysqli_query($connect,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);

   
    $res_data = mysqli_query($connect,$sql);
    $price;
    $item_list = '';
    while($row = mysqli_fetch_array($res_data)){
         
      
      
        if($_SESSION['language'] == 'EN'){

            $item_list .= '  <div class="bg-white box mb-4 item_detell" style="height: 200px;" id="'.$row['id'].'" >
                                    <div class="row" >

                                        <div class="col-sm-4 " >
                                            <img  style="width: 100%; height: 200px;"   src="./php/information/'.$row['image'].'" alt="First slide"><br/>
                                        </div >
                                        <div class="col-sm-8 " >
                                            
                                            <h5 class="mt-3 text-truncate"  > '.$row['titel_EN'].' </h5>
                                            <p><i class="fas fa-calendar-alt"></i> '.date("d-m-Y", strtotime($row['date'])).'</p>
                                            
                                            <p  class=" multi-line-truncate" style="width: 95%; height: 80px;" >'.$row['Description_EN'].'</p>

                                        </div>

                                    </div >
                            </div>';

        }else{

            $item_list .= '  <div class="bg-white box mb-4 item_detell" style="height: 200px;" id="'.$row['id'].'" >
                                <div class="row" >

                                    <div class="col-sm-4 " >
                                        <img  style="width: 100%; height: 200px;"   src="./php/information/'.$row['image'].'" alt="First slide"><br/>
                                    </div >
                                    <div class="col-sm-8 " >
                                        
                                        <h5 class="mt-3 text-truncate"  > '.$row['titel_LA'].' </h5>
                                        <p><i class="fas fa-calendar-alt"></i> '.date("d-m-Y", strtotime($row['date'])).'</p>
                                        
                                        <p  class=" multi-line-truncate" style="width: 95%; height: 80px;" >'.$row['Description_LA'].'</p>

                                    </div>

                                </div >
                        </div>';

        }

  
            
        
        

        
    }


    

    $output = array(
        'status' => 'ok',
        'itemlist' =>   $item_list,
        'total_rows' =>   $total_rows,
        'pagination' => pagination($total_rows,$no_of_records_per_page,$pageno,'information.php?')
       
        );
    echo json_encode($output);  
    

?>