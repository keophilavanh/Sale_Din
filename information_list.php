
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
                   
                    <th id="information_table_image">ຮູບຂ່າວ</th>
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
                <form method="post" id="insert_form" autocomplete="off">
                    <div class="modal-body">
                   

                                <div class="form-group row">
                                        
                                        <div class="col-sm-12">
                                            <img id="image" src="http://via.placeholder.com/500x500" alt="Smiley face" height="250" width="500" class="form-control">
                                        </div>
                                </div>
                                <div class="form-group row">
                                        
                                        <div class="col-sm-12">
                                            <label id="information_label_tetel_la" >ເລືອກຮູບ</label>
                                            <input class="form-control" type="file" name="file" id="files_load" />
                                        </div>
                                </div>

                                <div class="form-group row">
                                        
                                        <div class="col-sm-12">
                                            <label id="information_label_tetel_la" >ຫົວຂໍ້ຂ່າວພາສາລາວ</label>
                                            <textarea class="form-control" id="titel_la"  name="titel_la"></textarea>
                                        </div>
                                </div>
                            
                                <div class="form-group row">
                                        
                                        <div class="col-sm-12">
                                            <label id="information_label_tetel_la" >ຫົວຂໍ້ຂ່າວພາສາອັງກິດ</label>
                                            <textarea class="form-control" id="titel_en"  name="titel_en"></textarea>
                                        </div>
                                </div>
                                <div class="form-group row">
                                        
                                        <div class="col-sm-12">
                                            <label id="information_label_tetel_en" >ລາຍລະອຽດພາສາລາວ</label>
                                            <textarea class="form-control" id="description_la"  name="description_la"></textarea>
                                        </div>
                                </div>
                                <div class="form-group row">
                                        
                                        <div class="col-sm-12">
                                            <label id="information_label_tetel_en" >ລາຍລະອຽດພາສາອັງກິດ</label>
                                            <textarea class="form-control" id="description_en"  name="description_en"></textarea>
                                        </div>
                                </div>
                            
                                <div class="form-group row">
                
                                
                                        <div class="col-sm-12">
                                            <input type="hidden" name="cat_id" id="cat_id" />
                                            <input type="hidden" name="status" id="status" />
                                         
                                        </div>
                                  
                                    
                                </div>
                                

                    
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="insert" id="category_save"  class="btn btn-success" >Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
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
                url:"php/information/select.php",
                type:"POST"
                }

            }); 

            $('#information_add ').click(function () {
               
               $('#add_data_Modal').modal('show');
               $('#insert').val("ເພີ້ມພະນັກງານ");
               $('#insert_form')[0].reset();
               document.getElementById("image").src = 'http://via.placeholder.com/500x500';
               $('#status').val('Insert');
                 
           });

           $("#files_load").on('change',function(){
               try {
                    var file_upload = document.getElementById('files_load');
                    console.log(file_upload.files);
                    var reader = new FileReader();
                    reader.onload = function (e) {   
                        document.getElementById("image").src = e.target.result;
                    };
                    reader.readAsDataURL(file_upload.files[0]);
               } catch (error) {
                    document.getElementById("image").src = 'http://via.placeholder.com/500x500';
               }
                

            });


           $('#insert_form').on("submit", function(event){  
            event.preventDefault();  
            
                if($('#files_load').val() == ''  && $('#status').val() == 'Insert')  
                {  
                    msg('ເລືອກຮູບຂ່າວ','Select Image');
                } 
                else if($('#titel_la').val() == ''){
                    msg('ປ້ອມຊື່ຫົວຂໍ້ຂ່າວພາສາລາວ','en');
                }
                else if($('#titel_en').val() == ''){
                    msg('ປ້ອມຊື່ຫົວຂໍ້ຂ່າວພາສາອັງກິດ','en');
                }
                else if($('#description_la').val() == ''){
                    msg('ປ້ອມລາຍລະອຽດພາສາລາວ','en');
                }
                else if($('#description_en').val() == ''){
                    msg('ປ້ອມລາຍລະອຽດພາສາອັງກິດ','en');
                }
                else  
                {  

                    
                    console.log('data');
                    $.ajax({  
                        url:"php/information/insert_update_delete.php",  
                        method:"POST",
                        data:new FormData(this),
                        dataType:"json",  
                        contentType:false,
                        processData:false,
                        
                        success:function(data){  

                            console.log(data);
                            if(data.status == 'ok'){
                                $('#insert_form')[0].reset();  
                                document.getElementById("image").src = 'http://via.placeholder.com/500x500';
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
                    var id = $(this).attr("id");  
                    
                   
                    
                    $.ajax({  
                        url:"php/information/fetch.php",  
                        method:"POST",  
                        data:{id:id},  
                        dataType:"json",  
                        success:function(data){
                            console.log(data);  
                            $('#cat_id').val(data.id);  
                            $('#titel_la').val(data.titel_LA);  
                            $('#titel_en').val(data.titel_EN); 
                            $('#description_la').val(data.Description_LA);  
                            $('#description_en').val(data.Description_EN);
                            document.getElementById("image").src = 'php/information/'+data.image;
                        
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
                                    url:"php/information/insert_update_delete.php",  
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

