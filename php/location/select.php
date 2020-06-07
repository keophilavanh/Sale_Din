

 <?php
 include_once('../conn.php');
 session_start();
 $edit_text ='ແກ້ໄຂ';
 $delete_text ='ລົບ';
 $city_text = ' ເມືອງ';
 if($_SESSION['language'] == 'EN'){
  
    $edit_text ='Edit';
    $delete_text ='Delete';
    $city_text=' City';

  }

 $columns = array('provin_id', 'provin_name_la','provin_name_en','provin_id');
 //$sql = "SELECT * FROM tbl_sample ORDER BY id DESC OFFSET 0 ROWS FETCH NEXT 10 ROWS ONLY ";
 $sql = "SELECT * FROM provin WHERE parent is null";

 


 if(isset($_POST["search"]["value"]))
 {
   
    
    
    $sql .= ' And ( provin_name_la LIKE "%'.$_POST["search"]["value"].'%" 
    OR provin_name_en LIKE "%'.$_POST["search"]["value"].'%"
   
    
    )';

 }

 if(isset($_POST["order"]))
{
 $sql .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $sql .= 'ORDER BY provin_id DESC ';
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
        $sub_array[] = $row["provin_id"];
        $sub_array[] = $row["provin_name_la"];
        $sub_array[] = $row["provin_name_en"];

        $sql_conut = "SELECT * FROM provin WHERE parent =".$row["provin_id"];
        $city_count = mysqli_num_rows(mysqli_query($connect, $sql_conut));

        $sub_array[] = '<a href="sub_localtion.php?parent='.$row["provin_id"].'"  class="btn btn-pill btn-success edit_category" data-toggle="tooltip" ><i class="fas fa-city"></i>'.$city_count.' '.$city_text.' </a>';
      
        $sub_array[] = '
                         
                        <a href="#" id="'.$row["provin_id"].'" class="btn btn-pill btn-primary edit_category" data-toggle="tooltip" ><i class="fa fa-fw fa-edit"></i> '.$edit_text.' </a> 
                        <a href="#" id="'.$row["provin_id"].'" class="btn btn-icon btn-pill btn-danger delete_category" data-toggle="tooltip" ><i class="fa fa-fw fa-trash"></i> '.$delete_text.' </a>
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