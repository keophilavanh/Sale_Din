
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

    <?php include 'src.php';   ?>
</head>


<body class="bg-light">

<?php include 'header.php'; ?>


    
   

    <div class="content p-4 ">


        <div class="container h-100">
         
            <div class="row h-50 justify-content-center align-items-center">
            
                <div class="container ">
                <h1 class="text-center ">ສະໝັກສະມາຊິກ</h1><br/><br/><br/>
                <div class="card mb-4 ">
                    <div class="card-header bg-white font-weight-bold">
                        ແບບຟອມ
                    </div>
                    <div class="card-body">
                    <form method="post" id="register" autocomplete="off">
                            <div class="form-group">
                                <label >ຊື່ແທ້</label>
                                <input type="text" class="form-control" id="name"  placeholder="Enter Name" >
                                <small id="namehelp" class="form-text text-muted">ກະລຸນະປ້ອມຊື່ແທ້.</small>
                            </div>
                            <div class="form-group">
                                <label >ນາມສະກຸນ</label>
                                <input type="text" class="form-control" id="surname" placeholder="Enter Surname">
                                <small id="surnamehelp" class="form-text text-muted">ກະລຸນະປ້ອມນາມສະກຸນແທ້.</small>
                            </div>
                            <div class="form-group">
                                <label >ທີ່ຢູ່ປະຈຸດບັນ</label>
                                <textarea  class="form-control" id="address"  placeholder="Enter Address" rows="2"></textarea>
                                <small id="addressHelp" class="form-text text-muted">ກະລຸນະປ້ອມທີ່ຢູ່ປະຈຸດບັນ.</small>
                            </div>
                            <div class="form-group">
                                <label >ເບີໂທລະສັບ</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend3">+85620</span>
                                        </div>
                                        <input type="text" class="form-control " id="phone" placeholder="Enter Phone">
                                        
                                    </div>
                                    <small id="phoneHelp" class="form-text text-muted">ກະລຸນະປ້ອມເບີໂທລະສັບ.</small>
                            </div>
                               
                            
                            <div class="form-group">
                                <label >ຊື່ຜູ້ໃຊ້</label>
                                <input type="text" class="form-control" id="user"  placeholder="Enter email" >
                                
                            </div>
                            <div class="form-group">
                                <label >ລະຫັດຜ່ານ</label>
                               
                                <input type="password" class="form-control" id="Password1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label >ຢືນຢັນ ລະຫັດຜ່ານ</label>
                                <!-- <label >Confirm Password</label> -->
                                <input type="password" class="form-control" id="Password2" placeholder="Password">
                            </div>
                           
                            
                       
                    </div>
                    <div class="card-footer bg-white">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
                

                        
                

                </div>
            </div>
        </div>
        
               
        
        

    </div>
</div>
<script>

           
     

        $(document).ready(function () {

            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            var type = urlParams.get('type');
            if(type == 'Customer' || type == 'Member' || type == 'VIP'){

            }else{
                window.location.replace('packet.php');
            }
            console.log(type);

            

            $('#register').on("submit", function(event){  
            event.preventDefault();  

               

             if($('#name').val() == '')  
            {  
                
                msg('ກະລຸນະປ້ອມຂໍ້ມູນໃຫ້ຄົບຖ້ວນ','en');  
            }
            else if($('#surname').val() == '')  
            {  
                msg('ກະລຸນະປ້ອມຂໍ້ມູນໃຫ້ຄົບຖ້ວນ','en');  
            }  
            else if($('#address').val() == '')  
            {  
                msg('ກະລຸນະປ້ອມຂໍ້ມູນໃຫ້ຄົບຖ້ວນ','en');  
            } 
            else if($('#phone').val() == '')  
            {  
                msg('ກະລຸນະປ້ອມຂໍ້ມູນໃຫ້ຄົບຖ້ວນ','en');  
            } 
            else if($('#user').val() == '')  
            {  
                msg('ກະລຸນະປ້ອມຂໍ້ມູນໃຫ້ຄົບຖ້ວນ','en');   
            } 
            else if($('#Password1').val() == '')  
            {  
                msg('ກະລຸນະປ້ອມຂໍ້ມູນໃຫ້ຄົບຖ້ວນ','en');    
            }
            else if($('#Password2').val() == '')  
            {  
                msg('ກະລຸນະປ້ອມຂໍ້ມູນໃຫ້ຄົບຖ້ວນ','en');    
            }
             else if($('#Password2').val() != $('#Password1').val())  
            {  
                msg('ຢື້ນຢັນລະຫັດຜ່ານບໍ່ຕົງກັນ','en');    
            }
            
   
            else  
            {  
                console.log('post');
                var name = $('#name').val();
                var surname = $('#surname').val();
                var address = $('#address').val();
                var phone = $('#phone').val();
                var user = $('#user').val();
                var password = $('#Password1').val();
                $.ajax({  
                    url:"php/register.php",  
                    method:"POST",  
                    data:{name:name,surname:surname,address:address,phone:phone,user:user,password:password,type:type}, 
                    dataType:"json", 
                    success:function(data){  

                        console.log('data');
                        console.log(data);
                        if(data.status=='ok' && data.type =='Customer'){
                            msg('ສະມັກສະມມາຊີກສຳເລັດ...','en');
                        }else if( data.status=='ok' && data.type =='Member'){
                            msg('ລໍຖ້າທາງເວບໃຊ້ຕິດຕໍ່ຫາ','en');
                        }else if( data.status=='ok' && data.type =='VIP'){
                            msg('ລໍຖ້າທາງເວບໃຊ້ຕິດຕໍ່ຫາ','en');
                        }
                       
                        window.setTimeout(
                                    function(){
                                            window.location.replace("login.php");
                                        }, 1000);
                        

                
                    
                    }  
                }); 
                
            }  
            });

          
                        
        });
</script>





</body>
</html>
