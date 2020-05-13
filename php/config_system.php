
<?php
include_once('conn.php');
if(!empty($_POST))
{
    
        $query="UPDATE `system` SET `system`='".$_POST["token_bot"]."',`Name_EN`='".$_POST["token_bot"]."',`token_bot`='".$_POST["token_bot"]."'

        WHERE id = '".$_POST["user_id"]."'";  

        if(mysqli_query($connect, $query)){

            $output = array(
                'status' => 'ok',
                'msg' =>  'Update ສຳເລັດ...',
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
