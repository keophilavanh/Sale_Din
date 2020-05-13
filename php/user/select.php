

 <?php
 include_once('../conn.php');
 $columns = array('id', 'name','surname','phone','address','user_type');
 //$sql = "SELECT * FROM tbl_sample ORDER BY id DESC OFFSET 0 ROWS FETCH NEXT 10 ROWS ONLY ";
 $sql = "SELECT * FROM user ";

 


 if(isset($_POST["search"]["value"]))
 {
   
    
    
    $sql .= ' WHERE name LIKE "%'.$_POST["search"]["value"].'%" 
    OR surname LIKE "%'.$_POST["search"]["value"].'%"
    OR phone LIKE "%'.$_POST["search"]["value"].'%"
    OR address LIKE "%'.$_POST["search"]["value"].'%"
    OR user_type LIKE "%'.$_POST["search"]["value"].'%"
    
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
        $sub_array[] = $row["id"];
        $sub_array[] = $row["name"].' '.$row["surname"];
        $sub_array[] = $row["phone"];
        $sub_array[] = $row["address"];
        $sub_array[] = $row["user_type"];
        if($row["status"] == 'Active'){
            $sub_array[] = '<a href="#" id="'.$row["id"].'" class="btn btn-icon btn-pill btn-success active" data-toggle="tooltip" title="Change to No Active"><i class="fas fa-lock-open"></i> '.$row["status"].'</a>';
        }else{
            $sub_array[] = '<a href="#" id="'.$row["id"].'" class="btn btn-icon btn-pill btn-danger No_active" data-toggle="tooltip" title="Change to Active"><i class="fas fa-lock"></i> No Active </a>';
        }
        
        $sub_array[] = '
                        <a href="#" id="'.$row["id"].'" class="btn btn-pill btn-primary edit_data" data-toggle="tooltip" title="Edit"> Change Member </a> 
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