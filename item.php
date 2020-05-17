
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

    <?php include 'src.php';   ?>

  
</head>


<body class="bg-light">

<?php include 'header.php'; ?>

        

<div class="d-flex">
    
   
<?php include 'search.php'; ?>
    <div class="content p-4 ">
        

        <div class="container">
            <div class="row" id="itemlist"  >
            <div class="col-sm-7" id="image_list">
                



                           
            </div>
            <div class="col-sm-3 bg-dark  text-light">
                <br/>
                <h3 class="text-center"> ຊ່ອງທາງຕໍ່ເຮົາ </h3>
                <hr style=" border-top: 1px solid white;" /><br/>
                <h4> ຊື່ແລະນາມສະກຸນ </h4>
                <input id="text_name" type="text" class="form-control"  /> <br/>
                <h4> ເບີໂທຕິດຕໍ່ </h4>
                <input id="text_phone" type="text" class="form-control"  /> <br/>
                <h4> ຂໍ້ຄວາມ </h4>
                <textarea id="text_message" class="form-control" rows="3"  ></textarea> <br/>
                <button type="button" id="send_inbox" class="btn btn-primary  btn-lg form-control"> <i class="fa fa-envelope"></i> ສົ່ງຂໍ້ຄວາມ</button> <br/><br/>
            </div>

            <div class="col-sm-12 " style="width: 100%; height: 20px;">



            </div>

            <div class="col-sm-7 ">
                <div class="col-sm-12 bg-white  " >
                    <br/>
                    <h2 id="price">ລາຄາ : 15000000 ໂດລາ </h2><br/>

                    <h2 id="titel">ອາພາດເມັນໃນຕົວເມືອງວຽງຈັນແຫ່ງໃໝ່ (VLC): ພັກອາໄສ, ເຮັດວຽກ ແລະ ທ່ຽວຫຼິ້ນໄດ້ທີ່ ສູນກາງທີ່ຢູ່ອາໄສ </h2><br/>

                    <h4 id="localtion"><i class="fas fa-map-marker-alt"></i> ອາພາດເມັນໃນຕົວເມືອງວຽງຈັນແຫ່ງໃໝ່ (VLC): ພັກອາໄສ, ເຮັດວຽກ ແລະ ທ່ຽວຫຼິ້ນໄດ້ທີ່ ສູນກາງທີ່ຢູ່ອາໄສ </h4><br/>

                    <h4> ລາຍລະອຽດ :</h4>

                    <h5 id="description" > VLC ມີທຳເລທີ່ຕັ້ງທີ່ດີທີ່ສຸດໃນເຂດທຸລະກິດໃຈກາງນະຄອນຫຼວງວຽງຈັນ, ສູນການຄ້າວຽງຈັນເຊັນເຕີ, ໃກ້ຄຽງກັບບັນດາກະຊວງ ແລະ ສະຖານທູດຕ່າງໆ. ນອກນັ້ນຍັງໃກ້ກັບຮ້ານອາຫານ, ຮ້ານບັນເທິງທີ່ມີທັງສະໄຕລລາວ ແລະ ຕ່າງປະເທດ. ລວມທັງສູນການຄ້າປາກເຊີນ, ຕະຫຼາດເຊົ້າ, ແລະ ບັນດາຮ້ານຕ່າງໆອີກຫຼາຍຮ້ອຍແຫ່ງ.
ສະຖານທີ່ສາມາດຈັບຈອງໄດ້ທັງຄົນລາວ ແລະ ຄົນຕ່າງປະເທດໂດຍມີອາຍຸການເຊົ່າເຖິງ 70 ປີ ເຊິ່ງໝັ້ນໃຈໄດ້ເລີຍວ່າທ່ານຈະໄດ້ທຶນຄືນ 6% ຈາກການເຊົ່າພຽງແຕ່ 10 ປີ. ນັ້ນໝາຍຄວາມວ່າພາຍຫຼັງ 10 ປີທີ່ເປັນເຈົ້າຂອງແມ່ນທ່ານຈະໄດ້ຮັບທຶນຄືນ 60% ຈາກການລົງທຶນ.</h5>


                </div>

            
            </div>

           
                

            </div>
            <div class="container text-center" id="pagination"> 
                
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
                    var vendor_id = $(this).attr("data-vendor");  
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
                                                    dataTable.ajax.reload();
                                                }
                                            });
                    }
                   
                }); 
            
           

        });

</script>



