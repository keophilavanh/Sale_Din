
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

    <?php include 'src.php';   ?>

  
</head>


<body class="bg-light">

<?php 
 $fix="fixed-top";
    include 'header.php'; 

?>
        

<div class="d-flex">
    
   
<?php include 'search.php'; ?>
    <div class="content p-4 mt-5">
        

        <div class="container mt-5">
            <div class="row" id="itemlist"  >
            <div class="col-sm-12" >
                <img id="image_infor" style="width: 100%; " src="./php/information/img/1589971120.jpg" alt="First slide">         
            </div>
        

            <div class="col-sm-12 " style="width: 100%; height: 20px;">



            </div>

            <div class="col-sm-12 ">
                <div class="col-sm-12 bg-white  " >
                    <br/>
                    <!-- <h2 id="price">ລາຄາ : 15000000 ໂດລາ </h2><br/> -->

                    <h2 id="titel">ອາພາດເມັນໃນຕົວເມືອງວຽງຈັນແຫ່ງໃໝ່ (VLC): ພັກອາໄສ, ເຮັດວຽກ ແລະ ທ່ຽວຫຼິ້ນໄດ້ທີ່ ສູນກາງທີ່ຢູ່ອາໄສ </h2><br/>

                    <h6 id="date"><i class="fas fa-map-marker-alt"></i> ອາພາດເມັນໃນຕົວເມືອງວຽງຈັນແຫ່ງໃໝ່ (VLC): ພັກອາໄສ, ເຮັດວຽກ ແລະ ທ່ຽວຫຼິ້ນໄດ້ທີ່ ສູນກາງທີ່ຢູ່ອາໄສ </h6><br/>

                    <h4 id="description_titel">  ລາຍລະອຽດ :</h4>

                    <h5 id="description" > VLC ມີທຳເລທີ່ຕັ້ງທີ່ດີທີ່ສຸດໃນເຂດທຸລະກິດໃຈກາງນະຄອນຫຼວງວຽງຈັນ, ສູນການຄ້າວຽງຈັນເຊັນເຕີ, ໃກ້ຄຽງກັບບັນດາກະຊວງ ແລະ ສະຖານທູດຕ່າງໆ. ນອກນັ້ນຍັງໃກ້ກັບຮ້ານອາຫານ, ຮ້ານບັນເທິງທີ່ມີທັງສະໄຕລລາວ ແລະ ຕ່າງປະເທດ. ລວມທັງສູນການຄ້າປາກເຊີນ, ຕະຫຼາດເຊົ້າ, ແລະ ບັນດາຮ້ານຕ່າງໆອີກຫຼາຍຮ້ອຍແຫ່ງ.
ສະຖານທີ່ສາມາດຈັບຈອງໄດ້ທັງຄົນລາວ ແລະ ຄົນຕ່າງປະເທດໂດຍມີອາຍຸການເຊົ່າເຖິງ 70 ປີ ເຊິ່ງໝັ້ນໃຈໄດ້ເລີຍວ່າທ່ານຈະໄດ້ທຶນຄືນ 6% ຈາກການເຊົ່າພຽງແຕ່ 10 ປີ. ນັ້ນໝາຍຄວາມວ່າພາຍຫຼັງ 10 ປີທີ່ເປັນເຈົ້າຂອງແມ່ນທ່ານຈະໄດ້ຮັບທຶນຄືນ 60% ຈາກການລົງທຶນ.</h5>


                </div>

            
            </div>

           
                

            </div>
            <div class="container text-center" id="pagination"> 
                
            </div>

        </div>
        <?php include 'search.php'; ?>
    </div>
</div>





</body>
</html>

<script>

        $(document).ready(function () {

            function load_parameter(){
                const queryString = window.location.search;
                const urlParams = new URLSearchParams(queryString);
                const product = urlParams.get('information_id');
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
                    url:"php/information/information_detell.php",
                    method:"POST",
                    dataType:"json",
                    data:{information_id:load_parameter()},  
                    success:function(data){
                   
                       
                        document.getElementById("titel").innerHTML = data.titel;
                        document.getElementById("date").innerHTML = '<i class="fas fa-calendar-alt"></i> '+data.date;
                        document.getElementById("description").innerHTML = data.description;
                        // document.getElementById("send_inbox").setAttribute('data-vendor', data.vendor);
                        document.getElementById("image_infor").src = data.image;
                        //$('#image_infor').src = '..'+data.image_list;
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



