

 <?php
 include_once('../conn.php');
 session_start();
 
    $token = json_decode(base64_decode($_SESSION['token']));
 $edit_text ='ແກ້ໄຂ';
 $delete_text ='ລົບ';
 $message = 'ຕອບກັບ';
 if($_SESSION['language'] == 'EN'){
  
    $edit_text ='Edit';
    $delete_text ='Delete';
    $message = 'Reply';
    
  }

 $columns = array('id', 'Name_LA','Description_LA','Localtion_LA');
 //$sql = "SELECT * FROM tbl_sample ORDER BY id DESC OFFSET 0 ROWS FETCH NEXT 10 ROWS ONLY ";
 $sql = "SELECT * FROM inbox ";

 if($_SESSION["user_type"] == 'Admin'){
    $sql .="WHERE (`user_id`= -1 OR `user_id`=".$token->id." )AND";
  }else{
    $sql .="WHERE `user_id`=".$token->id." AND";
  }


 if(isset($_POST["search"]["value"]))
 {
   
    
    
    $sql .= '  ( message LIKE "%'.$_POST["search"]["value"].'%" 
                 OR phone LIKE "%'.$_POST["search"]["value"].'%"
                 OR name LIKE "%'.$_POST["search"]["value"].'%")
                
   
    
    ';

 }

 if(isset($_POST["order"]))
{
 $sql .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $sql .= 'ORDER BY id DESC ';
}



$qry =" ";
 if($_POST["length"] != -1)
{
 $qry = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
 //$qry = ' OFFSET '. $_POST['start'].' ROWS FETCH NEXT ' . $_POST['length'].' ROWS ONLY';
}

$total_count = 0;
$total_count = mysqli_num_rows(mysqli_query($connect, $sql));


 
 $result = mysqli_query($connect, $sql . $qry);
 $data = array();
if ($total_count > 0){
    
    while( $row =  mysqli_fetch_array($result)) {
    
        $sub_array = array();
        $sub_array[] =  $row["id"];
        $sub_array[] =  $row["name"];
        $sub_array[] =  $row["message"];
        $sub_array[] =  $row["phone"];

        if($row["from"]){
         $re_message = '<a href="#" id="'.$row["from"].'" class="btn btn-pill btn-primary reply" data-toggle="tooltip" ><i class="fa fa-envelope"></i> '.$message.' </a> ';
        }else{
         $re_message = '';
        }

        $sub_array[] = $re_message;
        
     
        $data[] = $sub_array;
    
    }
}
else{

        $sub_array = array();
        $sub_array[] = " ";
        $sub_array[] = " ";
        $sub_array[] = " ";
        $sub_array[] = " ";
        $sub_array[] = " ";
     
        
      
       
        $data[] = $sub_array;


}




$output = array(
    "draw"    => intval($_POST["draw"]),
    "recordsTotal"  =>  $total_count,
    "recordsFiltered" => $total_count,
    "data"    => $data
   );

echo json_encode($output);

?>