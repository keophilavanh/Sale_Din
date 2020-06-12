 <?php $link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <!-- <meta property="og:url"           content="" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content=" ຂາຍດີນລາຄາຖືກ" />
    <meta property="og:description"   content="ລາຍລະອຽດ" />
    <meta property="og:image"         content="http://nuengmamipoko.epizy.com/php/product/img/1590408862_1.jpeg" /> -->
    <?php include 'php/item/meta_item.php';   ?>
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

        
        

        <div class="container mt-5">
            <div class="row" id="itemlist"  >
                <div class="col-sm-7" >
                    <div class="col-sm-12" id="image_list">

                    



                            
                    </div>
                    <div class="col-sm-12    " style="width: 100%; height: 50px;">

                    <div id="fb-root"></div>
                    
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v7.0"></script>

                    <div class="fb-share-button" data-href="<?php echo $link; ?>" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fnuengmamipoko.epizy.com%2Fitem.php%3Fitem_id%3D154&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">แชร์</a></div>
                    </div>

                    <div class="col-sm-12 ">
               

                       
                        <div class="col-sm-12 bg-white  " >
                            
                            <br/>
                            <h2 id="price">ລາຄາ : 15000000 ໂດລາ </h2><br/>

                            <h2 id="titel">ອາພາດເມັນໃນຕົວເມືອງວຽງຈັນແຫ່ງໃໝ່ (VLC): ພັກອາໄສ, ເຮັດວຽກ ແລະ ທ່ຽວຫຼິ້ນໄດ້ທີ່ ສູນກາງທີ່ຢູ່ອາໄສ </h2><br/>

                            <h4 id="localtion"><i class="fas fa-map-marker-alt"></i> ອາພາດເມັນໃນຕົວເມືອງວຽງຈັນແຫ່ງໃໝ່ (VLC): ພັກອາໄສ, ເຮັດວຽກ ແລະ ທ່ຽວຫຼິ້ນໄດ້ທີ່ ສູນກາງທີ່ຢູ່ອາໄສ </h4><br/>

                            <h4 id="description_titel"> ລາຍລະອຽດ :</h4>

                            <h5 id="description" > ຈາກການລົງທຶນ.</h5>


                        </div>

                    
                    </div>



                            
                </div>
                <div class="col-sm-3 ">
                    <div class="col-sm-12  bg-success  text-light">
                        <br/>
                        <h3 id="contect_item" class="text-center"> ຊ່ອງທາງຕໍ່ເຮົາ </h3>
                        <hr style=" border-top: 1px solid white;" /><br/>
                        <h4 id="name_item"> ຊື່ແລະນາມສະກຸນ </h4>
                        <input id="text_name" type="text" class="form-control"  /> <br/>
                        <h4 id="phone_item"> ເບີໂທຕິດຕໍ່ </h4>
                        <input id="text_phone" type="text" class="form-control"  /> <br/>
                        <h4 id="message_item"> ຂໍ້ຄວາມ </h4>
                        <textarea id="text_message" class="form-control" rows="3"  ></textarea> <br/>

                        <?php 

                            if(isset($_SESSION['user_type'])){
                                echo '<button type="button" id="send_inbox" class="btn btn-primary  btn-lg form-control"> <i class="fa fa-envelope"></i> ສົ່ງຂໍ້ຄວາມ</button> <br/><br/>';
                            }else{
                                echo '<a href="login.php" type="button"  class="btn btn-primary  btn-lg form-control"> <i class="fa fa-envelope"></i> ສົ່ງຂໍ້ຄວາມ</a> <br/><br/>';
                            }

                        ?>
                        
                    </div>
                </div>

            

           

           
                

            </div>
            <div class="container text-center" id="pagination"> 
                
            </div>

        </div>
        <?php //include 'search.php'; ?>
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
                        try { document.getElementById("send_inbox").setAttribute('data-vendor', data.vendor);} catch (error) {}
                       
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
                        var user_id = '<?php if(isset($_SESSION['user_id'])){ echo $_SESSION['user_id']; }?>';

                        console.log('text_name');
                                    $.ajax({  
                                                url:"php/inbox/add_inbox.php",  
                                                method:"POST",  
                                                data:{name:name,phone:phone,message:message,vendor_id:vendor_id,user_id:user_id},  
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



