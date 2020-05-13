<?php  
 //fetch.php  
 include_once('conn.php'); 

      $query = "SELECT * FROM system ";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  

 ?>