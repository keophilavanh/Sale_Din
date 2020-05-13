<?php  

 include_once('../conn.php');
 session_start();
  
    $query = "SELECT * FROM category WHERE status = 'Active'";  
    $result = mysqli_query($connect, $query);  
    $output='';
    while( $row =  mysqli_fetch_array($result)) {
    
        if($_SESSION['language'] == 'EN'){
  
          

            $output.='<a href="index.php?category='.$row["cat_id"].'" class="dropdown-item" >'.$row["Name_EN"].'</a>';
            //$output.='<option value="'.$row["cat_id"].'">'.$row["Name_EN"].'</option>';
        
          }else{
            //$output.='<option value="'.$row["cat_id"].'">'.$row["Name_LA"].'</option>';
            $output.='<a href="index.php?category='.$row["cat_id"].'" class="dropdown-item"  >'.$row["Name_LA"].'</a>';
          }
       
        
       
    
    } 
    echo $output;  
 
 ?>