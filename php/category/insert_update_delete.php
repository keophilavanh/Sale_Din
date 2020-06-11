
<?php
include_once('../conn.php');
if(!empty($_POST))
{
    if($_POST["status"]=='Insert'){

        $query = "INSERT INTO `category` ( `Name_LA`,`Name_EN`,`Name_THAI`,`status`) VALUES ( '".$_POST["Name"]."','".$_POST["Name_EN"]."','".$_POST["Name_THAI"]."','".$_POST["Type"]."')";

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
        $query="UPDATE `category` SET  `Name_LA`='".$_POST["Name"]."',`Name_EN`='".$_POST["Name_EN"]."',`Name_THAI`='".$_POST["Name_THAI"]."',`status`='".$_POST["Type"]."'

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
