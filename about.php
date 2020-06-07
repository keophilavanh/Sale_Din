
<html lang="en">
<head>
    <meta charset="utf-8">
 
    <?php include 'src.php';   ?>

  
</head>


<body class="bg-light">

<?php 
//  $fix="fixed-top";
    include 'header.php'; 

?>
        

<div class="d-flex">
    
   
    <?php include 'search.php'; ?>
    <div class="content p-4 mt-5">

        <div class="container">

                <div class="card mb-4">
                        <div class="card-header bg-white font-weight-bold">        
                            <h4 id="Contact_titel_card">Contact</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                
                                <div class="col-6">
                                    <label id="name_item" >ຊື່ແລະນາມສະກຸນ</label>
                                    <input id="text_name" type="text" class="form-control"  /> 
                                </div>
                                <div class="col-6">
                                <label id="phone_item" >ເບີໂທຕິດຕໍ່</label>
                                    <input id="text_phone" type="text" class="form-control"  /> 
                                </div>
                                <div class="col-12 p-3">
                                    <label id="message_item" >ຂໍ້ຄວາມ</label>
                                    <textarea id="text_message" class="form-control" rows="3"  ></textarea> 
                                </div>
                                <div class="col-12">
                                    
                                    <button type="button" id="send_inbox" class="btn btn-primary  btn-lg form-control"> <i class="fa fa-envelope"></i> ສົ່ງຂໍ້ຄວາມ</button>
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

            function load_parameter(){
                const queryString = window.location.search;
                const urlParams = new URLSearchParams(queryString);
                const product = urlParams.get('item_id');
                if(product){
                    return product;
                }else{
                    return 1;
                }
            }

            var currency =  localStorage.getItem("currency");


            $('#search').click(function () {
               
               $('#add_data_Modal').modal('show');
               $('#insert_form')[0].reset();
            
                 
           });
            
            $.ajax({
                    url:"php/item/item_detell.php",
                    method:"POST",
                    dataType:"json",
                    data:{product_id:load_parameter(),currency:currency},  
                    success:function(data){
                   
                        document.getElementById("price").innerHTML = data.price;
                        document.getElementById("titel").innerHTML = data.titel;
                        document.getElementById("localtion").innerHTML = data.localtion;
                        document.getElementById("description").innerHTML = data.description;
                        document.getElementById("send_inbox").setAttribute('data-vendor', data.vendor);
                        $('#image_list').html(data.image_list);
                        console.log(data);

                    }
                });


                
                $(document).on('click', '#send_inbox', function(){  
                    //var vendor_id = $(this).attr("data-vendor");  
                    var vendor_id = -1;
                    console.log(vendor_id);
                    if($('#text_name').val() ==''){
                        msg('ປ້ອນຊື່ແລະນາມສະກຸນ','Enter Name and Firstname');
                    }else if($('#text_phone').val() ==''){
                        msg('ປ້ອນເບີໂທຕິດຕໍ່','Enter Phone numbers');
                    }else if($('#text_message').val() ==''){
                        msg('ປ້ອນຂໍ້ຄວາມ','Enter message');
                    }else{
                      
                        var name = $('#text_name').val();
                        var phone = $('#text_phone').val();
                        var message = $('#text_message').val();

                        console.log('text_name');

                        msg('ກຳລັງໂຫລດ...','Loading...');
                                    $.ajax({  
                                                url:"php/inbox/add_inbox.php",  
                                                method:"POST",  
                                                data:{name:name,phone:phone,message:message,vendor_id:vendor_id},  
                                                dataType:"json",  
                                                success:function(data){  
                                                    if(data.status == 'ok'){
                                                        $('#text_name').val('');
                                                        $('#text_phone').val('');
                                                        $('#text_message').val('');
                                                        msg(data.msg,data.msg);
                                                      

                                                    }else{
                                                        msg(data.msg,data.msg);
                                                    }
                                                    
                                                }
                                            });
                    }
                   
                }); 
            
           

        });

</script>



