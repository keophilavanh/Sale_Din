
<?php
//insert.php  
include_once('conn.php'); 
session_start();
if(!empty($_POST))

{
    $temp = explode(".", $_FILES["file"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $target = "../img/logo/".$newfilename;
    if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }


    
   
    $query = "UPDATE system SET image = '$newfilename' WHERE id = '404'";


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
