<?php
 include_once('php/conn.php'); 
 $link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 if(isset($_GET["item_id"]))  
 {  

    $query_sh = "SELECT * FROM product WHERE id = '".$_GET["item_id"]."'";  
    $result_sh = mysqli_query($connect, $query_sh);  
    $row_sh = mysqli_fetch_array($result_sh); 

    $query_image = "SELECT * FROM image WHERE pro_id = '".$_GET["item_id"]."' LIMIT 1";  
    $result_image = mysqli_query($connect, $query_image);  
    $row_image = mysqli_fetch_array($result_image);

    $image_part="http://".$_SERVER['HTTP_HOST']."/php/".$row_image['part'].$row_image['name'];

    $mata = '   <meta property="og:url"           content="'.$link.'" /> 
                <meta property="og:type"          content="POST" />
                <meta property="og:title"         content="'.$row_sh['Name_LA'].'" />
                <meta property="og:description"   content="'.$row_sh['Localtion_LA'].'" />
                <meta property="og:image"         content="'. $image_part.'" />';

    echo $mata;
 }
     


?>