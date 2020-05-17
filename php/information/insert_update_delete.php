
<?php
include_once('../conn.php');
if(!empty($_POST))
{
    if($_POST["status"]=='Insert'){
       
        $temp = explode(".", $_FILES["file"]["name"]);
        $newfilename = round(microtime(true)) .'.'. end($temp);
        $target_part = "img/".$newfilename;
        move_uploaded_file($_FILES['file']['tmp_name'] , $target_part );

       
    


        $query = "INSERT INTO `information` (`titel_LA`, `titel_EN`, `Description_LA`, `Description_EN`, `image`) 
        VALUES ( '".$_POST["titel_la"]."','".$_POST["titel_en"]."','".$_POST["description_la"]."','".$_POST["description_en"]."','".$target_part."')";

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
        if($_FILES["file"]["name"]){
            
            $temp = explode(".", $_FILES["file"]["name"]);
            $newfilename = round(microtime(true)) .'.'. end($temp);
            $target_part = "img/".$newfilename;
            move_uploaded_file($_FILES['file']['tmp_name'] , $target_part );

            $query="UPDATE `information` SET `titel_LA`='".$_POST["titel_la"]."',
            `titel_EN`='".$_POST["titel_en"]."',
            `Description_LA`='".$_POST["description_la"]."',
            `Description_EN`='".$_POST["description_en"]."',
            `image`='".$target_part."'

            WHERE id = '".$_POST["cat_id"]."'"; 

           


        }else{
            $query="UPDATE `information` SET `titel_LA`='".$_POST["titel_la"]."',
                                         `titel_EN`='".$_POST["titel_en"]."',
                                         `Description_LA`='".$_POST["description_la"]."',
                                         `Description_EN`='".$_POST["description_en"]."'
                                        

            WHERE id = '".$_POST["cat_id"]."'";  

           
        }

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
                );
            echo json_encode($output);  

        }
        
        

        
            
            
    }
    else if($_POST["status"]=='Delete')  
    {  
            $query = "DELETE  FROM information WHERE id = '".$_POST["cat_id"]."'";  

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
