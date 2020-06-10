
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
                    <h4 id="add_product" >ຂໍ້ມູນສິນຄ້າ</h4>
                </div>
                <form method="post" id="insert_form" autocomplete="off">
                <div class="card-body">
                    <div class="row"> 
                   
                        <div class="col-sm-6">
                            <div class="col-sm-12">
                                <h4 id="product_text_name_la"> ຊື່ຫົວຂໍ້ພາສາລາວ </h4>
                                <input type="text" class="form-control" name="Name_LA" id="Name_LA"  >
                            </div><br/>
                            <div class="col-sm-12">
                                <h4 id="product_text_description_la"> ລາຍລະອຽດ </h4>
                                <textarea class="form-control" id="Description_LA" rows="3" name="Description_LA" ></textarea>
                            </div><br/>
                            <div class="col-sm-12">
                                <h4 id="product_text_localtion_la"> ທີ່ຕັ້ງຂອງດິນ </h4>
                                <textarea class="form-control" id="Localtion_LA" name="Localtion_LA" rows="2"></textarea>
                            </div><br/>
                            <div class="col-sm-12">

                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 id="product_text_price_kip"> ລາຄາເປັນເງີນກີບ </h4>
                                    <input type="number" class="form-control" name="Price_KIP" id="Price_KIP"   />
                                       
                                  
                                </div>
                                <div class="col-sm-6">
                                    <h4 id="product_text_price_thb"> ລາຄາເປັນເງີນບາດ </h4>
                                    <input type="number" class="form-control" name="Price_THB" id="Price_THB"   />
                                </div>
                            </div>

                            </div>
                            <div class="col-sm-12">

                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 id="product_text_KIP_m"> ເງີນກີບຕໍ່ແມັດ </h4>
                                    <input type="number" class="form-control" name="KIP_m" id="KIP_m"   />
                                       
                                  
                                </div>
                                <div class="col-sm-6">
                                    <h4 id="product_text_THB_m"> ເງີນບາດຕໍ່ແມັດ </h4>
                                    <input type="number" class="form-control" name="THB_m" id="THB_m"   />
                                </div>
                            </div>

                            </div>
                            <div class="col-sm-12">

                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 id="product_category"> ປະເພດ </h4>
                                    <select class="form-control" name="cat_id" id="category_select">
                                       
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <h4 id="product_text_file"> ເລືອກຮູບ </h4>
                                    <input type="File" class="form-control" name="file" id="files_load"  multiple />
                                </div>
                            </div>

                            </div>
                            
                            
                            
                        </div>
                        <div class="col-sm-6">
                            <div class="col-sm-12">
                                <h4 id="product_text_name_en"> ຊື່ຫົວຂໍ້ພາສາອັງກິດ </h4>
                                <input type="text" class="form-control" name="Name_EN" id="Name_EN"  >
                            </div><br/>
                            <div class="col-sm-12">
                                <h4 id="product_text_discription_en"> ລາຍລະອຽດພາສາອັງກິດ </h4>
                                <textarea class="form-control" id="Description_EN" name="Description_EN" rows="3"></textarea>
                            </div><br/>
                            <div class="col-sm-12">
                                <h4 id="product_text_localtion_en"> ທີ່ຕັ້ງຂອງດິນ </h4>
                                <textarea class="form-control" id="Localtion_EN" name="Localtion_EN" rows="2"></textarea>
                            </div><br/>
                            <div class="col-sm-12">
                               
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4 id="product_text_price_usd"> ລາຄາເປັນເງີນໂດລາ</h4>
                                        <input type="number" class="form-control" name="Price_USD" id="Price_USD"   />
                                        
                                    
                                    </div>
                                   
                                </div>

                                       
                                  
                                
                            </div>
                            <div class="col-sm-12">
                               
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4 id="product_text_USD_m"> ເງີນໂດລາຕໍ່ແມັດ</h4>
                                        <input type="number" class="form-control" name="USD_m" id="USD_m"   />
                                        
                                    
                                    </div>
                                   
                                </div>

                                       
                                  
                                
                            </div>
                            
                        </div>


                    
                    </div>
                   

                    <div class="row" >
                        <div class="col-sm-12" >
                            <div class="col-sm-12">
                                <h4 id="header_img" >  </h4>
                               
                            </div><br/>
                            <div class="col-sm-12 row" id="view_image">
                            
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <button type="submit" id="product_save" class="btn btn-primary">ບັນທຶກ</button>
                    <a href="javascript:history.back();" class="btn btn-secondary"  id="product_close">Close</a> 
                </div>
                </form>

        </div>
        
    </div>

</div>



</body>
</html>
<script>

        $(document).ready(function () {

            $.ajax({
                    url:"php/product/select_category.php",
                    method:"POST",
                    dataType:"text",
                    success:function(data){
                    $('#category_select').html(data);
                    }
                });

                function upload_mu(id){
                    var file_upload = document.getElementById('files_load');
                    var xhr = new XMLHttpRequest();
                    var formData = new FormData();

                    for (const file of file_upload.files) {
                        
                        formData.append("myFile[]",file);
                        
                    }
                   
                   
                    xhr.open("post","php/product/upload.php"+'?pro_id='+id);
                    xhr.send(formData);
                    msg('ເພີ້ມຂໍ້ມູນສຳເລັດ','Added completed');
                    setTimeout(function(){  window.location.replace('product.php'); }, 2000);
                   
                }

        $("#files_load").on('change',function(){
            var file_upload = document.getElementById('files_load');
                console.log(file_upload.files);
                $('#view_image').html('');
       
                

              


                if(file_upload.files[0]){

                    for (let index = 0; index < file_upload.files.length; index++) {
                        var reader = new FileReader();
                        reader.onload = function (e) {

                            var code = '<div class="card" style="width: 150px; height: 150px;"> <img class="card-img-top" height="150" width="150" src="'+e.target.result+'" alt="Card image cap"> </div>';
                            
                            $('#view_image').append(code);
                        };
                        reader.readAsDataURL(file_upload.files[index]);
                        
                    }
                  
                    document.getElementById("header_img").innerHTML = 'ຮູບທີເລືອກ';

                }

              
               
           
        
        });


        $('#insert_form').on("submit", function(event){  
            event.preventDefault();  
            
                if($('#Name_LA').val() == '')  
                {  
                    msg('ປ້ອນຊື່ຫົວຂໍ້ພາສາລາວ','Enter a title for the Lao language');
                } 
                else if($('#Name_EN').val() == ''){
                    msg('ປ້ອນຊື່ຫົວຂໍ້ພາສາອັງກິດ','Enter a title for the English language');
                }
                else if($('#Description_LA').val() == ''){
                    msg('ປ້ອນຊື່ຫົວຂໍ້ພາສາອັງກິດ','Enter a title for the English');
                }
                else if($('#Description_EN').val() == ''){
                    msg('ປ້ອນຊື່ຫົວຂໍ້ພາສາອັງກິດ','Enter a title for the English');
                }
                else if($('#Localtion_LA').val() == ''){
                    msg('ປ້ອນຊື່ຫົວຂໍ້ພາສາອັງກິດ','Enter a title for the English');
                }
                else if($('#Localtion_EN').val() == ''){
                    msg('ປ້ອນຊື່ຫົວຂໍ້ພາສາອັງກິດ','Enter a title for the English');
                }
                else if($('#category_select').val() == ''){
                    msg('ເລືອກປະເພດ','Enter a title for the English');
                }
                else if($('#files_load').val() == ''){
                    msg('ເລືອກຮູບ','Select Image');
                }
                else if($('#Price_KIP').val() == ''){
                    msg('ປ້ອນຊື່ຫົວຂໍ້ພາສາອັງກິດ','Enter a title for the English');
                }
                else if($('#Price_THB').val() == ''){
                    msg('ປ້ອນຊື່ຫົວຂໍ້ພາສາອັງກິດ','Enter a title for the English');
                }
                else if($('#Price_USD').val() == ''){
                    msg('ປ້ອນຊື່ຫົວຂໍ້ພາສາອັງກິດ','Enter a title for the English');
                }
                else if($('#KIP_m').val() == ''){
                    msg('ປ້ອນເງີນກີບຕໍ່ແມັດ','Enter a title for the English');
                }
                else if($('#THB_m').val() == ''){
                    msg('ປ້ອນເງີນບາດຕໍ່ແມັດ','Enter a title for the English');
                }
                else if($('#USD_m').val() == ''){
                    msg('ປ້ອນເງີນໂດລາຕໍ່ແມັດ','Enter a title for the English');
                }
                else  
                {  

                  
                   
                    
                    $.ajax({  
                        url:"php/product/add_product.php",  
                        method:"POST",  
                        data:new FormData(this),
                        dataType:"json",  
                        contentType:false,
                        processData:false,
                        success:function(data){  

                            console.log(data);
                            upload_mu(data.id);
                           

                        
                        }  
                    }); 
                    
                }  
            });


            



        });

</script>


