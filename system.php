
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

        <div class="row">
                                        
                <div class="col-sm-3">
                                          
                                            
                        <div class="card mb-4">
                            <div class="card-header bg-white font-weight-bold">        
                                <h4 id="">ຮູບພາບໂລໂກ</h4>
                            </div>
                            <div class="card-body">
                               
                                            
                                       
                                            <div class="text-center">
                                                <img src="img/icon.png" class="rounded" id="image_logo" alt="Logo" width="150" height="150">
                                            </div>  
                                      

                            </div>
                            <div class="card-footer bg-white">
                                <button id="Upload_logo" class="btn btn-primary"> ປ່ຽນໂລໂກ </button>
                            </div>
                        </div>
                </div>

                <div class="col-sm-7">
                        <div class="card mb-4">
                            <div class="card-header bg-white font-weight-bold">        
                                <h4 >ຂໍ້ມູນເວບໃຊ້</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                        
                                        <div class="col-sm-6">
                                            <h4> ຊື່ເວບໃຊ້ເປັນພາສາລາວ </h4>
                                            <input type="text" class="form-control" name="Name_System" id="Name_System" >
                                        </div>

                                        <div class="col-sm-6">
                                            <h4> Telegram Token</h4>
                                            <input type="text" class="form-control" name="token_bot" id="token_bot" >
                                        </div>
                                        
                                    
                                    
                                </div>

                                <div class="form-group row">
                                        
                                        <div class="col-sm-6">
                                            <h4> ຊື່ເວບໃຊ້ເປັນພາສາອັງກິດ </h4>
                                            <input type="text" class="form-control" name="Name_System_EN" id="Name_System_EN" >
                                        </div>

                                       
                                        
                                    
                                    
                                </div>
                                        
                                

                                                    
                                                        
                            </div>
                            <div class="card-footer bg-white">
                                <button id="update_system" class="btn btn-primary">ບັນທຶກ</button>
                            </div>
                        </div>
                                            
                </div>

                
        </div>


                <div id="add_data_Modal" class="modal fade">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 id="insert_h" class="modal-title">ແກ້ໄຂຮູບພາບ</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form id="image_form" method="post" enctype="multipart/form-data">
                    <center>
                    <h4  class="modal-title">ເລືອກຮູບໂລໂກ</h4>
                    <br />
                    <p><label>Select Image</label>
                    <input type="file" name="file" id="image" /></p><br />
                    <input type="hidden" name="id_update" id="id_update" class="form-control" style="width:250px"/>
                    <input type="submit" name="cancel" id="cancel" value="ບັນທຶກ" class="btn btn-success"/>
                    </center>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
                </div>
                </div>

        
        
    </div>

</div>

                



</body>
</html>
<script>
        $(document).ready(function () {

           

           

           
            load_from();
           
            $(document).on('click', '#update_system', function(){  
             
             
                var la = 'ທ່ານຕ້ອງການແກ້ໄຂ້ຂໍ້ມູນລະບົບຫຼືບໍ່ ?';
                var en = 'DO YOU Want Edit System  ?';
                var msg = la;
                var text = 'ກະລຸນາຢືນຢັນ';
                var language = localStorage.getItem("language");
                if(language == 'EN' ){
                    msg = en;
                    text = 'Message Confirm';
                }

                if($('#Name_System').val() == '')  
                {  
                    msg('ປ້ອມຊື່ເວບໄຊ','en');
                } 
                else if($('#Name_System_EN').val() == ''){
                    msg('ປ້ອມຊື່ເວບໄຊພາສາອັງກິດ','en');
                }
                else if($('#token_bot').val() == ''){
                    msg('ປ້ອມຊື່ເວບໄຊພາສາອັງກິດ','en');
                }
                else  
                {  

                    swal({
                        title: msg,
                        text: text,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {

                            var Name_System = $('#Name_System').val();
                            var Name_System_EN = $('#Name_System_EN').val();
                            var token_bot = $('#token_bot').val();

                                    $.ajax({  
                                        url:"php/update_system_name.php",  
                                        method:"POST",  
                                        data:{Name_System:Name_System,Name_System_EN:Name_System_EN,token_bot:token_bot},  
                                        dataType:"json",  
                                        success:function(data){  

                                        //console.log(data);
                                            if(data.status == 'ok'){
                                                swal({
                                                    title: data.msg,
                                                    text:   "Alert !",
                                                    icon: "warning",
                                                }); 
                                            
                                                load_from();
                                            }else{
                                                msg(data.msg,data.msg);
                                            }
                                            
                                            
                                        }

                                    });
                        } 
                    
                    }); 

                }

                
               
                
              
            });

            $(document).on('click', '#Upload_logo', function(){            
                $('#add_data_Modal').modal('show');
            });


            $('#image_form').submit(function(event){
                event.preventDefault();
                var image_name = $('#image').val();
                if(image_name == '')
                {
                alert("Please Select Image");
                return false;
                }
                else
                {
                var extension = $('#image').val().split('.').pop().toLowerCase();
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                    alert("Invalid Image File");
                    $('#image').val('');
                    return false;
                }
                else
                {
                    console.log(new FormData(this));
                    $.ajax({
                    url:"php/upload_logo.php",
                    method:"POST",
                    data:new FormData(this),
                    dataType:"json",  
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
                    
                        if(data.status == 'ok'){

                           
                            $('#image_form')[0].reset();
                            $('#add_data_Modal').modal('hide');
                            load_from();
                            msg(data.msg,data.msg); 
                        

                        }
                      
                       

                    }
                    });

                  
                }
                }
                });

           
            
           


        });
</script>

