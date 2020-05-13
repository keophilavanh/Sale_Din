
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

    <?php include 'src.php';  ?>

  
</head>


<body class="bg-light">

<?php include 'header.php';  ?>




    
<div class="d-flex">
    <?php include 'menu.php'; ?>

    <div class="content p-4 ">
        <?php include './php/dashboard.php';  ?>

        <div class="card mb-4">
                <div class="card-header bg-white font-weight-bold">        
                    <h4 id="inbox_titel_card">ອິນບ໋ອກ</h4>
                </div>
                <div class="card-body">
                
                <table id="example" class="table table-hover" cellspacing="0" width="100%">
                
                <thead>
                <tr>
                    <th id="inbox_table_code">ລະຫັດ</th>
                    <th id="inbox_table_name">ຊື່ແລະນາມສະກຸນ</th>
                    <th id="inbox_table_message">ຂໍ້ຄວາມ</th>
                    <th id="inbox_table_phone">ເບີໂທສັບ</th>
                   
                   
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
                "serverSide":true,
                "order":[],
                "ajax":{
                url:"php/inbox/select.php",
                type:"POST"
                }

            });
  

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


