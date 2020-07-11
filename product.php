
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

    <?php include 'src.php';  ?>

  
</head>


<body class="bg-light">


<?php 
$admin='class=" mr-3 sidebar-toggle" href="#"';   
include 'header.php'; 

?>



    
<div class="d-flex">
    <?php include 'menu.php'; ?>

    <div class="content p-4 ">

        <div class="card mb-4">
                <div class="card-header bg-white font-weight-bold">        
                    <h4 id="product_list_titel_card">ຂໍ້ມູນສິນຄ້າ</h4>
                </div>
                <div class="card-body">
                <div align="right">   
                    <a href="add_product.php" class="btn btn-success" title="ເພີ້ມ" name="add" id="product_list_btn_add_product" >ເພີ້ມຂໍ້ມູນສິນຄ້າ</a>
                    <h1></h1>   
                </div>
                <table id="example" class="table table-hover" cellspacing="0" width="100%">
                
                <thead>
                <tr>
                    <!-- <th>ຮູບພາບ</th> -->
                    <th id="product_list_table_code">ລະຫັດສິນຄ້າ</th>
                    <th id="product_list_table_name">ຊື່ສິນຄ້າ</th>
                    <th id="product_list_table_description">ລາຍລະອຽດ</th>
                    <th id="product_list_table_localtion">ທີ່ຢູ່</th>
                    <th id="product_list_table_price">ລາຄາ</th> 
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
        
    </div>

</div>



</body>
</html>

<script>
        $(document).ready(function () {

           
            
            var dataTable = $('#example').DataTable({
                "processing":true,
                "responsive": true,
                "serverSide":true,
                "order":[],
                "ajax":{
                url:"php/product/select.php",
                type:"POST"
                }

            });

        //     $('#category_add').click(function () {
               
        //        $('#add_data_Modal').modal('show');
        //        $('#insert').val("ເພີ້ມພະນັກງານ");
        //        $('#insert_form')[0].reset();
        //        $('#status').val('Insert');
                 
        //    });


           
              
               

                $(document).on('click', '.delete_product', function(){  
                var product_id = $(this).attr("id");  
                 swal({
                        title: "ລົບຂໍ້ມູນ",
                        text: "ເຈົ້າຕ້ອງການລົບຂໍ້ມູນ ຫຼື່ບໍ່!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {

                            $.ajax({  
                                    url:"php/product/delete_product.php",  
                                    method:"POST",  
                                    data:{product_id:product_id},  
                                    dataType:"json",  
                                    success:function(data){  
                                        if(data.status == 'ok'){
                                            msg(data.msg,data.msg);

                                        }else{
                                            msg(data.msg,data.msg);
                                        }
                                        dataTable.ajax.reload();
                                    }
                                });
                                

                           
                        }      
                    }); 
                
                  
            }); 

        });
</script>


