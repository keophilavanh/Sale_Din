
<?php
include_once('../conn.php');
if(!empty($_POST))
{
    if($_POST["status"]=='Insert'){

        $query = "INSERT INTO `information` (`titel_LA`, `titel_EN`, `Description_LA`, `Description_EN`, `image`) 
        VALUES ( '".$_POST["titel_LA"]."','".$_POST["titel_EN"]."','".$_POST["Description_LA"]."','".$_POST["Description_EN"]."','".$_POST["image"]."')";

        if(mysqli_query($connect, $query)){

            $output = array(
                'status' => 'ok',
                'msg' =>  'Insert ສຳເລັດ...'

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
    else if($_POST["status"]=='Update')  
    {  
        $query="UPDATE `category` SET  `Name_LA`='".$_POST["Name"]."',`Name_EN`='".$_POST["Name_EN"]."',`status`='".$_POST["Type"]."'

        WHERE cat_id = '".$_POST["cat_id"]."'";  

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
    else if($_POST["status"]=='Delete')  
    {  
            $query = "DELETE  FROM category WHERE cat_id = '".$_POST["cat_id"]."'";  

            if(mysqli_query($connect, $query)){

                $output = array(
                    'status' => 'ok',
                    'msg' =>  'Delete ສຳເລັດ...'
    
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

    
    
     
    
    
}
?>
