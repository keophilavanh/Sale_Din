

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
 $sql = "SELECT * FROM information ";

 


 if(isset($_POST["search"]["value"]))
 {
   
    
    
    $sql .= ' WHERE titel_LA LIKE "%'.$_POST["search"]["value"].'%" 
    OR titel_EN LIKE "%'.$_POST["search"]["value"].'%"
    OR Description_LA LIKE "%'.$_POST["search"]["value"].'%"
    OR Description_EN LIKE "%'.$_POST["search"]["value"].'%"
   
    
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
        if($row["image"]){
            $sub_array[] = '<img  src="php/information/'.$row["image"].'" alt="Smiley face" height="150" width="150" >';
        }else{
            $sub_array[] = '<img  src="http://via.placeholder.com/150x150" alt="Smiley face" height="150" width="150" >';
        }
        
        $sub_array[] = 'ພາສາລາວ : <br/>'.$row["titel_LA"].' <br/> ພາສາອັງກິດ : <br/>'.$row["titel_EN"] ;
        $sub_array[] = 'ພາສາລາວ : <br/>'.$row["Description_LA"].' <br/> ພາສາອັງກິດ : <br/>'.$row["Description_EN"] ;
      

        $sub_array[] = '
                        <a href="#" id="'.$row["id"].'" class="btn btn-pill btn-primary edit_category" data-toggle="tooltip" ><i class="fa fa-fw fa-edit"></i> '.$edit_text.' </a> 
                        <a href="#" id="'.$row["id"].'" class="btn btn-icon btn-pill btn-danger delete_category" data-toggle="tooltip" ><i class="fa fa-fw fa-trash"></i> '.$delete_text.' </a>
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