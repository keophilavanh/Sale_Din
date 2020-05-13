
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
                <div class="container h-100">
                    <div class="row h-50 justify-content-center align-items-center">
                        <div class="col-md-4">
                            <h1 class="text-center mb-4" id="change_password_titel">BootAdmin</h1>
                            <div class="card">
                                <div class="card-body">
                               
                                      

                                        <div class="form-group row">
            
                                            <div class="col-sm-12">
                                                    <label id="change_password_old_Password" >Old Password</label>
                                                    <input type="text" class="form-control"    autocomplete="off" id="old_Password">
                        
                                            </div>
                                           
                                        </div>
                                        <div class="form-group row">
            
                                            <div class="col-sm-12">
                                                    <label  id="change_password_new_Password">New Password</label>
                                                    <input type="password" class="form-control"   autocomplete="off" id="New_Password">
                        
                                            </div>
                                           
                                        </div>
                                        <div class="form-group row">
            
                                            <div class="col-sm-12">
                                                    <label id="change_password_Confirm_Password">Confirm Password</label>
                                                    <input type="password" class="form-control"   autocomplete="off" id="Confirm_Password">
                        
                                            </div>
                                           
                                        </div>

                                       

                                      

                                        <div class="row">
                                            <div class="col pr-2">
                                                <button  class="btn btn-block btn-primary" id="change_password_button">Login</button>
                                            </div>
                                          
                                        </div>
                                   
                                </div>
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

           
          

            $(document).on('click', '#change_password_button', function(){  
               
                var la = 'ທ່ານຕ້ອງການປ່ຽນລະຫັດຜ່ານ ຫຼືບໍ່ ?';
                var en = 'DO YOU WANT CHANGE PASSWORD ?';
                var msg_text = la;
                var text = 'ກະລຸນາຢືນຢັນ';
                var language = localStorage.getItem("language");

                if(language == 'EN' ){
                    msg_text = en;
                    text = 'Message Confirm';
                }

                if($('#old_Password').val()==''){
                    msg('ປ້ອມລະຫັດເກົ່າ','Enter Old Passsword');
                }else if($('#New_Password').val()==''){
                    msg('ປ້ອມລະຫັດໃໝ່','Enter New Passsword');
                }else if($('#Confirm_Password').val()==''){
                    msg('ປ້ອມຢຶນຢັນລະຫັດໃໝ່','Enter Confirm Passsword');
                }else if($('#Confirm_Password').val() != $('#New_Password').val()){
                    msg('ຢຶນຢັນລະຫັດຜ່ານ ແລະ ລະຫັດໃໝ່ບໍ່ຕົງກັນ','Confirm Passsword Invalid');
                }else{

                    var old_password = $('#old_Password').val();
                    var new_password = $('#New_Password').val();

                    swal({
                    title: msg_text,
                    text: text,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {

                        console.log('send');
                        $.ajax({  
                                    url:"php/change_password/change_password.php",  
                                    method:"POST",  
                                    data:{old_password:old_password,new_password:new_password},  
                                    dataType:"json",  
                                    success:function(data){ 
                                        
                                        console.log(data);
                                       
                                        if(data.status == 'ok'){
                                            msg('ສະມັກສະມມາຊີກສຳເລັດ...','en');
                                        }else{
                                            msg(data.msg,data.msg);
                                        }
                                        
                                        
                                    }
                                });
                               
                                
                        
                        
        
        
                    } else {
                        console.log('not submit');
                                           
                    }
                }); 

                }

                
               
                
              
            });





           


            
        });
</script>


