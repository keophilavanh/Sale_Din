<?php
include_once('../conn.php');

//session_start();
 //   $token = json_decode(base64_decode($_SESSION['token']));
    
if(!empty($_POST))
{
    
       
        $query = "INSERT INTO `inbox`(`message`, `phone`, `name`, `user_id`) 
        VALUES ( '".$_POST["message"]."','".$_POST["phone"]."','".$_POST["name"]."','".$_POST["vendor_id"]."')";
        

        if(mysqli_query($connect, $query)){

            $insert_id = mysqli_insert_id($connect);

            $output = array(
                'status' => 'ok',
                'msg' =>  'Send ສຳເລັດ...',
               
                );
            $string = 'ແຈ້ງເຕືອນຂໍ້ຄວາມ ຊື່ : '.$_POST["name"].'  ເບີໂທ : '.$_POST["phone"].'  ຂໍ້ຄວາມ :'.$_POST["message"];
            include_once('../send_messange_bot_telegram.php'); 
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