
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
                    <h4 id="user_titel_card">ຂໍ້ມູນຜູ້ໃຊ້</h4>
                </div>
                <div class="card-body">
                <div align="right">   
                    <!-- <button type="button" class="btn btn-success" title="ເພີ້ມ" name="add" id="add" >ເພີ້ມຂໍ້ມູນປະເພດທີດິນ</button> -->
                    <h1></h1>   
                </div>
                <table id="example" class="table table-hover" cellspacing="0" width="100%">
                
                <thead>
                <tr>
                    <!-- <th>ຮູບພາບ</th> -->
                    <th id="user_table_code">ລະຫັດ</th>
                    <th id="user_table_name">ຊື່ແລະນາມສະກຸນ</th>
                    <th id="user_table_phone">ເບີໂທ</th>
                    <th id="user_table_address">ທີ່ຢູ່</th>
                    <th id="user_table_menber">ສະມາຊິກ</th>
                    <th id="user_table_status">ສະຖານະ</th>
                    <!-- <th>Action</th> -->
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

            $(document).on('click', '.back', function(){  
                window.location.replace('../../../main.php');
            });
            
            var dataTable = $('#example').DataTable({
                "processing":true,
                "serverSide":true,
                "responsive": true,
                "order":[],
                "ajax":{
                url:"php/user/select.php",
                type:"POST"
                }

            });

          





         
             
            
             $(document).on('click', '.active', function(){  
                var user_id = $(this).attr("id"); 
                var status = 'No Active';
                var la = 'ທ່ານຕ້ອງການ Unactive User ຫຼືບໍ່ ?';
                var en = 'DO YOU Want Unactive User ?';
                var msg = la;
                var text = 'ກະລຸນາຢືນຢັນ';
                var language = localStorage.getItem("language");
                if(language == 'EN' ){
                    msg = en;
                    text = 'Message Confirm';
                }

                
               
                swal({
                    title: msg,
                    text: text,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {

                        $.ajax({  
                                    url:"php/user/active_user.php",  
                                    method:"POST",  
                                    data:{user_id:user_id,status:status},  
                                    dataType:"json",  
                                    success:function(data){  
                                       
                                        if(data.status == 'ok'){
                                            msg('ສະມັກສະມມາຊີກສຳເລັດ...','Complete the application');
                                        }else{
                                            msg('ສະມັກສະມມາຊີກສຳເລັດ...','Complete the application');
                                        }
                                        
                                        
                                    }
                                });
                                dataTable.ajax.reload();
                                
                        
                        
        
        
                    } else {
                        
                        return false                        
                    }
                }); 
              
            });

            $(document).on('click', '.No_active', function(){  
                var user_id = $(this).attr("id"); 
                var status = 'Active';
                var la = 'ທ່ານຕ້ອງການ Active User ຫຼືບໍ່ ?';
                var en = 'DO YOU Want Active User ?';
                var msg = la;
                var text = 'ກະລຸນາຢືນຢັນ';
                var language = localStorage.getItem("language");
                if(language == 'EN' ){
                    msg = en;
                    text = 'Message Confirm';
                }

                
               
                swal({
                    title: msg,
                    text: text,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        
                        $.ajax({  
                                    url:"php/user/active_user.php",  
                                    method:"POST",  
                                    data:{user_id:user_id,status:status},  
                                    dataType:"json",  
                                    success:function(data){  
                                       
                                        if(data.status == 'ok'){
                                            msg('ສະມັກສະມມາຊີກສຳເລັດ...','Complete the application');
                                        }else{
                                            msg('ສະມັກສະມມາຊີກສຳເລັດ...','Complete the application');
                                        }
                                        
                                        
                                    }
                                });
                                dataTable.ajax.reload();
        
        
                    } else {
                        
                        return false                        
                    }
                });
            });
           


            
        });
</script>


