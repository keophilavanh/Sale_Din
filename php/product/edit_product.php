
<?php
include_once('../conn.php');
session_start();
    $token = json_decode(base64_decode($_SESSION['token']));
    
if(!empty($_POST))
{
    
       
        $query = "UPDATE `product` SET  `Name_LA`='".$_POST["Name_LA"]."',
                                        `Name_EN`='".$_POST["Name_EN"]."',
                                        `Description_LA`='".$_POST["Description_LA"]."',
                                        `Description_EN`='".$_POST["Description_EN"]."',
                                        `Localtion_LA`='".$_POST["Localtion_LA"]."',
                                        `Localtion_EN`='".$_POST["Localtion_EN"]."',
                                        `cat_id`='".$_POST["cat_id"]."',
                                        `Price_KIP`='".$_POST["Price_KIP"]."',
                                        `Price_THB`='".$_POST["Price_THB"]."',
                                        `Price_USD`='".$_POST["Price_USD"]."',

                                        `KIP_m`='".$_POST["KIP_m"]."',
                                        `THB_m`='".$_POST["THB_m"]."',
                                        `USD_m`='".$_POST["USD_m"]."' 
                                        
                                        WHERE  id = ".$_GET["product_id"];
        
        
        

        if(mysqli_query($connect, $query)){

            $output = array(
                'status' => 'ok',
                'msg' =>  'Update ສຳເລັດ...',
              
               
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
