
<?php
include_once('../conn.php');
session_start();
if(!empty($_POST))
{

    
    
     $token = json_decode(base64_decode($_SESSION['token']));
   

        if($token->password == $_POST["old_password"]){

            $query="UPDATE `user` SET `password`='".$_POST["new_password"]."'

            WHERE id = '".$token->id."'";  
    
            if(mysqli_query($connect, $query)){
    
                $output = array(
                    'status' => 'ok',
                    'msg' =>  'Update ສຳເລັດ...'
                 
                    );
                echo json_encode($output);  
    
            }else{
    
                $output = array(
                    'status' => 'error',
                    'msg' =>  mysqli_error($connect),
                    );
                echo json_encode($output);  
    
            }

        }else{

            $output = array(
                'status' => 'error',
                'msg' =>  'old password invalid',
                );
            echo json_encode($output); 

        }

      
            
   

    
    
     
    
    
}
?>
