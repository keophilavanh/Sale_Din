<?php  
 //fetch.php  
 include_once('../conn.php'); 
 if(isset($_POST["cat_id"]))  
 {  
      $query = "SELECT * FROM category WHERE cat_id = '".$_POST["cat_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>