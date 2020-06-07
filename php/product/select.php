

 <?php
 include_once('../conn.php');
 session_start();
 
    $token = json_decode(base64_decode($_SESSION['token']));
 $edit_text ='ແກ້ໄຂ';
 $delete_text ='ລົບ';
 if($_SESSION['language'] == 'EN'){
  
    $edit_text ='Edit';
    $delete_text ='Delete';

  }

 $columns = array('id', 'Name_LA','Description_LA','Localtion_LA');
 //$sql = "SELECT * FROM tbl_sample ORDER BY id DESC OFFSET 0 ROWS FETCH NEXT 10 ROWS ONLY ";
 $sql = "SELECT * FROM product ";

 if($_SESSION["user_type"] == 'Admin'){
   $sql .="WHERE ";
 }else{
   $sql .="WHERE `user_id`=".$token->id." AND";
 }


 if(isset($_POST["search"]["value"]))
 {
   
    
    
    $sql .= '   ( Name_LA LIKE "%'.$_POST["search"]["value"].'%" 
                 OR Name_EN LIKE "%'.$_POST["search"]["value"].'%"
                 OR Description_LA LIKE "%'.$_POST["search"]["value"].'%"
                 OR Description_EN LIKE "%'.$_POST["search"]["value"].'%"
                 OR Localtion_LA LIKE "%'.$_POST["search"]["value"].'%"
                 OR Localtion_EN LIKE "%'.$_POST["search"]["value"].'%"
                 OR id LIKE "%'.$_POST["search"]["value"].'%")
                
   
    
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
        $sub_array[] = 'ພາສາລາວ : <br/>'.$row["Name_LA"].' <br/> ພາສາອັງກິດ : <br/>'.$row["Name_EN"] ;
        $sub_array[] = 'ພາສາລາວ : <br/>'.$row["Description_LA"].' <br/> ພາສາອັງກິດ : <br/>'.$row["Description_EN"] ;
        $sub_array[] = 'ພາສາລາວ : <br/>'.$row["Localtion_LA"].' <br/> ພາສາອັງກິດ : <br/>'.$row["Localtion_EN"] ;
        $sub_array[] = ''.number_format($row["Price_USD"]).' USD <br/>  '.number_format($row["Price_THB"]).' THB <br/> '.number_format($row["Price_KIP"],0).' KIP' ;
      
        // if($row["status"] == 'Active'){
        //     $sub_array[] = '<a href="#" id="'.$row["id"].'" class="btn btn-icon btn-pill btn-success " data-toggle="tooltip" >'.$row["status"].'</a>';
        // }else{
        //     $sub_array[] = '<a href="#" id="'.$row["id"].'" class="btn btn-icon btn-pill btn-danger " data-toggle="tooltip" > No Active </a>';
        // }
        
        $sub_array[] = '
                        <a href="edit_product.php?product_id='.$row["id"].'" class="btn btn-pill btn-primary" data-toggle="tooltip" ><i class="fa fa-fw fa-edit"></i> '.$edit_text.' </a> 
                        <a href="#" id="'.$row["id"].'" class="btn btn-icon btn-pill btn-danger delete_product" data-toggle="tooltip" ><i class="fa fa-fw fa-trash"></i> '.$delete_text.' </a>
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