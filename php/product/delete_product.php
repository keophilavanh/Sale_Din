
<?php
include_once('../conn.php');
session_start();
    $token = json_decode(base64_decode($_SESSION['token']));
    
if(!empty($_POST))
{
    
       
        $query = " DELETE FROM `product` WHERE `id`=".$_POST["product_id"];
        

        if(mysqli_query($connect, $query)){

        
            $output = array(
                'status' => 'ok',
                'msg' =>  'Delete ສຳເລັດ...',
              
               
                );
            echo json_encode($output);  
        
        }else{

            $output = array(
                'status' => 'error',
                'msg' =>  mysqli_error($connect),
                'sql'=> $query,
                );
            echo json_encode($output);  

        } 
    
}
?>
