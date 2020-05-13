<?php
include_once('../conn.php');
    var_dump($_FILES);
    $i=0;
    $pro_id= $_GET['pro_id'];
    //$pro_id = 55;
    foreach($_FILES['myFile']['tmp_name'] as $key => $value){
        $i++;
        $temp = explode(".", $_FILES["myFile"]["name"][$key]);
        $newfilename = round(microtime(true)) .'_'.$i. '.' . end($temp);

        //$target_part = "img/".basename($_FILES['myFile']['name'][$key]);
        $target_part = "img/".$newfilename;
        move_uploaded_file($value , $target_part );

        $query = "INSERT INTO `image` (`pro_id`, `name`, `part`) VALUES ( '$pro_id', '$target_part', 'product/')";

        mysqli_query($connect, $query);
    }

 
?>