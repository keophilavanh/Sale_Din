<?php  
 //fetch.php  
 include 'conn.php';
 $response;
 if(!empty($_POST)) 
 {  
      $query = "SELECT * FROM user WHERE username ='".$_POST['Username']."' And password ='".$_POST['Password']."'";
      $result = mysqli_query($connect, $query);  
      $row=mysqli_fetch_array($result);  
      if($row != ''){
        session_start();
		      $_SESSION['ses_id']= session_id();
          $_SESSION['user']= $row["name"].' '.$row["surname"];
          $_SESSION['user_type'] = $row["user_type"];
          $_SESSION['token'] = base64_encode(json_encode($row));
          
        $response = 'true';

      } else {
        
        $response = 'false';
      }
      echo $response;
      
 }  
 ?>