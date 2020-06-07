<?php  

 include_once('../conn.php');
 session_start();
  
    $query = "SELECT * FROM provin WHERE parent is null";
    $result = mysqli_query($connect, $query);  
    $output='';
    while( $row =  mysqli_fetch_array($result)) {
    
        if($_SESSION['language'] == 'EN'){
  
          

            $output.='<a href="#" class="dropdown-item select_provin" id="'.$row["provin_id"].'" data-text="'.$row["provin_name_en"].'" >'.$row["provin_name_en"].'</a>';
        
          }else{
            
            $output.='<a href="#" class="dropdown-item select_provin" id="'.$row["provin_id"].'" data-text="'.$row["provin_name_la"].'" >'.$row["provin_name_la"].'</a>';
          }
       
        
       
    
    } 
    echo $output;  
 
 ?>