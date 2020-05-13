<?php  
 //fetch.php  
 include_once('../conn.php'); 
 if(isset($_POST["product_id"]))  
 {  
      $query = "SELECT * FROM product WHERE id = '".$_POST["product_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>