<?php  
 //fetch.php  
 include_once('../conn.php'); 
 if(isset($_POST["provin_id"]))  
 {  
      $query = "SELECT * FROM provin WHERE provin_id = '".$_POST["provin_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>