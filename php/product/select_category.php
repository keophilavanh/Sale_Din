<?php  

 include_once('../conn.php');
 session_start();
  
    $query = "SELECT * FROM category WHERE status = 'Active'";  
    $result = mysqli_query($connect, $query);  
    $output='<option value="">ເລືອກ</option>';
    while( $row =  mysqli_fetch_array($result)) {
    
        if($_SESSION['language'] == 'EN'){
  
            $output.='<option value="'.$row["cat_id"].'">'.$row["Name_EN"].'</option>';
        
          }else{
            $output.='<option value="'.$row["cat_id"].'">'.$row["Name_LA"].'</option>';
          }
       
        
       
    
    } 
    echo $output;  
 
 ?>