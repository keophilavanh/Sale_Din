<?php  

 include_once('../conn.php');
  
 if(isset($_POST["product_id"])){

    $query = "SELECT * FROM image WHERE pro_id =".$_POST["product_id"];  
    $result = mysqli_query($connect, $query);  
    $output='';
    while( $row =  mysqli_fetch_array($result)) {
    
        
        $output.=' <div class=" p-1" style="width: 170px; height: 200px;">
                        <div class="box item" >
                            <div class="remove"><a href="#" data-code="'.$row['id'].'" data-name="'.$row['name'].'" class="btn btn-danger remove_img">X</a></div>
                            <img class="card-img-top" src="php/'.$row['part'].$row['name'].'" width="150" height="180" alt="Card image cap">  
                        </div>
                    </div>';
    
    } 
    echo $output;  

 }
   
 
 ?>