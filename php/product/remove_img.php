<?php
include_once('../conn.php');

if(isset($_POST["img_id"])) 
{
   
       
        $query = "DELETE FROM `image` WHERE `id`=".$_POST["img_id"];
        

        if(mysqli_query($connect, $query)){

            
            $file_to_delete = $_POST['data_name'];
            unlink($file_to_delete);

            $output = array(
                'status' => 'ok',
                'msg' =>  'DELETE ສຳເລັດ...',
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