

 <?php
 include_once('../conn.php');
 session_start();
 $edit_text ='ແກ້ໄຂ';
 $delete_text ='ລົບ';
 if($_SESSION['language'] == 'EN'){
  
    $edit_text ='Edit';
    $delete_text ='Delete';

  }

 $columns = array('cat_id', 'Name_LA','Name_EN','status');
 //$sql = "SELECT * FROM tbl_sample ORDER BY id DESC OFFSET 0 ROWS FETCH NEXT 10 ROWS ONLY ";
 $sql = "SELECT * FROM category ";

 


 if(isset($_POST["search"]["value"]))
 {
   
    
    
    $sql .= ' WHERE Name_LA LIKE "%'.$_POST["search"]["value"].'%" 
    OR Name_EN LIKE "%'.$_POST["search"]["value"].'%"
    OR cat_id LIKE "%'.$_POST["search"]["value"].'%"
    OR status LIKE "%'.$_POST["search"]["value"].'%"
   
    
    ';

 }

 if(isset($_POST["order"]))
{
 $sql .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $sql .= 'ORDER BY cat_id DESC ';
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
        $sub_array[] = $row["cat_id"];
        $sub_array[] = $row["Name_LA"];
        $sub_array[] = $row["Name_EN"];
        $sub_array[] = $row["Name_THAI"];
      
        if($row["status"] == 'Active'){
            $sub_array[] = '<a href="#" id="'.$row["cat_id"].'" class="btn btn-icon btn-pill btn-success " data-toggle="tooltip" >'.$row["status"].'</a>';
        }else{
            $sub_array[] = '<a href="#" id="'.$row["cat_id"].'" class="btn btn-icon btn-pill btn-danger " data-toggle="tooltip" > No Active </a>';
        }
        
        $sub_array[] = '
                        <a href="#" id="'.$row["cat_id"].'" class="btn btn-pill btn-primary edit_category" data-toggle="tooltip" ><i class="fa fa-fw fa-edit"></i> '.$edit_text.' </a> 
                        <a href="#" id="'.$row["cat_id"].'" class="btn btn-icon btn-pill btn-danger delete_category" data-toggle="tooltip" ><i class="fa fa-fw fa-trash"></i> '.$delete_text.' </a>
                        ';
       
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