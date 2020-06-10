
<?php
include_once('../conn.php');
session_start();
    $token = json_decode(base64_decode($_SESSION['token']));
    
if(!empty($_POST))
{
    
       
        $query = "INSERT INTO `product` (`Name_LA`, `Name_EN`, `Description_LA`, `Description_EN`, `Localtion_LA`, `Localtion_EN`, `cat_id`,`user_id`,`Price_KIP`, `Price_THB`, `Price_USD`,`view`, `USD_m`, `KIP_m`, `THB_m`) 
        VALUES ( '".$_POST["Name_LA"]."','".$_POST["Name_EN"]."','".$_POST["Description_LA"]."','".$_POST["Description_EN"]."','".$_POST["Localtion_LA"]."','".$_POST["Localtion_EN"]."','".$_POST["cat_id"]."','".$token->id."','".$_POST["Price_KIP"]."','".$_POST["Price_THB"]."','".$_POST["Price_USD"]."',0,'".$_POST["USD_m"]."','".$_POST["KIP_m"]."','".$_POST["THB_m"]."')";
        

        if(mysqli_query($connect, $query)){

            $insert_id = mysqli_insert_id($connect);

            $output = array(
                'status' => 'ok',
                'msg' =>  'Insert ສຳເລັດ...',
                'id' => $insert_id
               
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
