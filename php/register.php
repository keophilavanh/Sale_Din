
<?php
include_once('conn.php');
if(!empty($_POST))
{
    
        $query = "INSERT INTO `user` ( `name`, `surname`, `address`, `phone`, `username`, `password`, `user_type`) 
        VALUES ( '".$_POST["name"]."', '".$_POST["surname"]."', '".$_POST["address"]."', '".$_POST["phone"]."', '".$_POST["user"]."', '".$_POST["password"]."', '".$_POST["type"]."')
        ";
        if(mysqli_query($connect, $query)){

            $output = array(
                'status' => 'ok',
                'msg' =>  'register ສຳເລັດ...',
                'type' =>  $_POST["type"],

                );
            echo json_encode($output);  

        }else{

            $output = array(
                'status' => 'error',
                'msg' =>  mysqli_error($connect),
                );
            echo json_encode($output);  

        }
   

    
    
     
    
    
}
?>
