
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

        <div class="card mb-4">
                <div class="card-header bg-white font-weight-bold">        
                    <h4 id="information_titel_card">ຂໍ້ມູນຂ່າວສານ</h4>
                </div>
                <div class="card-body">
                <div align="right">   
                    <button type="button" class="btn btn-success" title="ເພີ້ມ" name="add"  id="information_add" >ເພີ້ມຂໍ້ມູນຂ່າວສານ</button>
                    <h1></h1>   
                </div>
                <table id="example" class="table table-hover" cellspacing="0" width="100%">
                
                <thead>
                <tr>
                   
                    <th id="information_table_image" >ຮູບຂ່າວ</th>
                    <th id="information_table_titel">ຫົວຂໍ້ຂ່າວ</th>
                    <th id="information_table_Description">ລາຍລະອຽດ</th>
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
                    
                    <h4 id="insert_information_titel" class="modal-title">ເພີ້ມລາຍການ</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                    <div class="modal-body">
                    <form method="post" id="insert_form" autocomplete="off">
                            
                                <div class="form-group row">
                                        
                                        <div class="col-sm-7">
                                            <label id="category_label_name" >ເບີໂທ</label>
                                            <input type="text" class="form-control" name="Name" id="Name" >
                                        </div>
                                </div>
                                <div class="form-group row">
                                        
                                        <div class="col-sm-7">
                                            <label id="category_label_name_en" >ເບີໂທ</label>
                                            <input type="text" class="form-control" name="Name_EN" id="Name_EN" >
                                        </div>
                                </div>
                            
                                <div class="form-group row">
                
                                
                                    <div class="col-sm-7">
                                        <label id="category_label_status" >ສິດ</label>
                                        <select class="form-control"  name="Type" id="Type">
                                            
                                            <option value="Active">Active</option>
                                            <option value="No Active">No Active</option>
                                        
                                            
                                        </select>
                
                                    </div>
                                </div>
                            
                                    <input type="hidden" name="cat_id" id="cat_id" />
                                    <input type="hidden" name="status" id="status" />
                                    <button type="submit" name="insert" id="category_save"  class="btn btn-success" >Save</button>
                                    

                                

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
                "order":[],
                "ajax":{
                url:"php/category/select.php",
                type:"POST"
                }

            }); 

            $('#information_add ').click(function () {
               
               $('#add_data_Modal').modal('show');
               $('#insert').val("ເພີ້ມພະນັກງານ");
               $('#insert_form')[0].reset();
               $('#status').val('Insert');
                 
           });


           $('#insert_form').on("submit", function(event){  
            event.preventDefault();  
            
                if($('#Name').val() == '')  
                {  
                    msg('ປ້ອມຊື່ປະເພດ','en');
                } 
                else if($('#Name_EN').val() == ''){
                    msg('ປ້ອມຊື່ພາສາອັງກິດ','en');
                }
                else  
                {  


                    $.ajax({  
                        url:"php/category/insert_update_delete.php",  
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
                    var cat_id = $(this).attr("id");  
                    
                   
                    
                    $.ajax({  
                        url:"php/category/fetch.php",  
                        method:"POST",  
                        data:{cat_id:cat_id},  
                        dataType:"json",  
                        success:function(data){
                            console.log(data);  
                            
                            $('#Name').val(data.Name_LA);  
                            $('#Name_EN').val(data.Name_EN); 
                            $('#cat_id').val(data.cat_id);  
                            $('#Type').val(data.status);
                        
                        
                            $('#add_data_Modal').modal('show');
                            // $('#insert').val("ແກ້ໄຂຂໍ້ມູນປະເພດສິນຄ້າ");
                            $('#status').val('Update');  
                        }  
                    });  
                });

               

                $(document).on('click', '.delete_category', function(){  
                var cat_id = $(this).attr("id");  
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
                                    url:"php/category/insert_update_delete.php",  
                                    method:"POST",  
                                    data:{cat_id:cat_id,status:status},  
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

