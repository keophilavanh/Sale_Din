
<?php
include_once('conn.php');
if(!empty($_POST))
{
     
        $query="UPDATE `system` SET  `Name_LA`='".$_POST["Name_System"]."',`Name_EN`='".$_POST["Name_System_EN"]."',`token_bot`='".$_POST["token_bot"]."'

        WHERE id = '404'";  

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
            

}
?>
