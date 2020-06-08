<?php  
 //fetch.php  
 include 'conn.php';
 $response = array(
  'status' => 'false',
  'msg' =>  'User Not Active ',
 
  );
 if(!empty($_POST)) 
 {  
      $query = "SELECT * FROM user WHERE username ='".$_POST['Username']."' And password ='".$_POST['Password']."'";
      $result = mysqli_query($connect, $query);  
      $row=mysqli_fetch_array($result);  
      if($row != ''){

        if($row["status"] =='Active'){

          session_start();
		      $_SESSION['ses_id']= session_id();
          $_SESSION['user']= $row["name"].' '.$row["surname"];
          $_SESSION['user_type'] = $row["user_type"];
          $_SESSION['user_id'] = $row["id"];
          $_SESSION['token'] = base64_encode(json_encode($row));

          $response = array(
            'status' => 'true',
            'msg' =>  'Login ສຳເລັດ...',
           
            );

        }else{
          $response = array(
            'status' => 'false',
            'msg' =>  'User Not Active ',
           
            );

        }
        

      } else {
        
        $response = array(
          'status' => 'false',
          'msg' =>  'User And password Invalit',
         
          );

      }
      echo json_encode($response);
      
 }  
 ?>