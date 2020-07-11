
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
                    <h4 id="localtion_titel_card">ຂໍ້ມູນແຂວງ</h4>
                </div>
                <div class="card-body">
                <div align="right">   
                    <button type="button" class="btn btn-success" title="ເພີ້ມ" name="add"  id="localtion_add" >ເພີ້ມຂໍ້ມູນແຂວງ</button>
                    <h1></h1>   
                </div>
                <table id="example" class="table table-hover" cellspacing="0" width="100%">
                
                <thead>
                <tr>
                   
                    <th id="localtion_table_code" >ລະຫັດ</th>
                    <th id="localtion_table_name">ຊື່ແຂວງ</th>
                    <th id="localtion_table_name_en">ຊື່ແຂວງພາສາອັງກິດ</th>
                    <th id="localtion_table_status" >ເມືອງ</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
        
    </div>

</div>

                <div id="add_data_Modal" class="modal fade">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 id="insert_localtion_titel" class="modal-title">ເພີ້ມລາຍການ</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                    <div class="modal-body">
                    <form method="post" id="insert_form" autocomplete="off">
                            
                                <div class="form-group row">
                                        
                                        <div class="col-sm-7">
                                            <label id="localtion_label_name" >ຊື່ແຂວງ</label>
                                            <input type="text" class="form-control" name="Name" id="Name" >
                                        </div>
                                </div>
                                <div class="form-group row">
                                        
                                        <div class="col-sm-7">
                                            <label id="localtion_label_name_en" >ຊື່ແຂວງພາສາອັງກິດ</label>
                                            <input type="text" class="form-control" name="Name_EN" id="Name_EN" >
                                        </div>
                                </div>
                            
                               
                            
                                    <input type="hidden" name="provin_id" id="provin_id" />
                                    <input type="hidden" name="status" id="status" />
                                    <button type="submit" name="insert" id="localtion_save"  class="btn btn-success" >Save</button>
                                    

                                

                                </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
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
                "responsive": true,
                "order":[],
                "ajax":{
                url:"php/location/select.php",
                type:"POST"
                }

            });

            $('#localtion_add').click(function () {
               
               $('#add_data_Modal').modal('show');
               $('#insert').val("ເພີ້ມພະນັກງານ");
               $('#insert_form')[0].reset();
               $('#status').val('Insert');
                 
           });


           $('#insert_form').on("submit", function(event){  
            event.preventDefault();  
            
                if($('#Name').val() == '')  
                {  
                    msg('ປ້ອນຊື່ປະເພດ','Enter a category name');
                } 
                else if($('#Name_EN').val() == ''){
                    msg('ປ້ອນຊື່ພາສາອັງກິດ','Enter an English name');
                }
                else  
                {  


                    $.ajax({  
                        url:"php/location/insert_update_delete.php",  
                        method:"POST",  
                        data:$('#insert_form').serialize(),  
                       
                        beforeSend:function(){  
                        $('#insert').val("ເພີ້ມລາຍການ");  
                        },  
                        dataType:"json", 
                        success:function(data){  

                            console.log(data);
                            if(data.status == 'ok'){

                                
                                $('#insert_form')[0].reset();  
                               
                               

                                msg(data.msg,data.msg);

                            }else{
                                msg(data.msg,data.msg);
                            }
                            $('#add_data_Modal').modal('hide');  
                            dataTable.ajax.reload();

                        
                        }  
                    }); 
                    
                }  
            });

                $(document).on('click', '.edit_category', function(){  
                    var provin_id = $(this).attr("id");  
                    
                   
                    
                    $.ajax({  
                        url:"php/location/fetch.php",  
                        method:"POST",  
                        data:{provin_id:provin_id},  
                        dataType:"json",  
                        success:function(data){
                            console.log(data);  
                            
                            $('#Name').val(data.provin_name_la);  
                            $('#Name_EN').val(data.provin_name_en); 
                            $('#provin_id').val(data.provin_id);  
                         
                        
                        
                            $('#add_data_Modal').modal('show');
                            // $('#insert').val("ແກ້ໄຂຂໍ້ມູນປະເພດສິນຄ້າ");
                            $('#status').val('Update');  
                        }  
                    });  
                });

               

                $(document).on('click', '.delete_category', function(){  
                var provin_id = $(this).attr("id");  
                var status ='Delete';
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
                                    url:"php/location/insert_update_delete.php",  
                                    method:"POST",  
                                    data:{provin_id:provin_id,status:status},  
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

