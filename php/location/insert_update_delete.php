
<?php
include_once('../conn.php');
if(!empty($_POST))
{
    if($_POST["status"]=='Insert'){

        $query = "INSERT INTO `provin` ( `provin_name_la`, `provin_name_en`) VALUES ( '".$_POST["Name"]."','".$_POST["Name_EN"]."')";

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
        $query="UPDATE `provin` SET  `provin_name_la`='".$_POST["Name"]."',`provin_name_en`='".$_POST["Name_EN"]."'

        WHERE provin_id = '".$_POST["provin_id"]."'";  

         if(mysqli_query($connect, $query)){

            $output = array(
                'status' => 'ok',
                'msg' =>  'Update ສຳເລັດ...'

                );
           // echo $query;
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
            $query = "DELETE  FROM provin WHERE provin_id = '".$_POST["provin_id"]."'";  

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
