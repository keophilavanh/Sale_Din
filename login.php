
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

    <?php include 'src.php';  ?>
</head>


<body class="bg-light">

<?php include 'header.php'; ?>


    
   

    <div class="content p-4 ">
        

        <div class="container">

                <div class="container h-100">
                    <div class="row h-50 justify-content-center align-items-center">
                        <div class="col-md-4">
                            <h1 class="text-center mb-4" id="titel_login">BootAdmin</h1>
                            <div class="card">
                                <div class="card-body">
                               
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Username" id="Username">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                                            </div>
                                            <input type="password" class="form-control" placeholder="Password" id="Password">
                                        </div>

                                        <!-- <div class="form-check mb-3">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="remember" class="form-check-input">
                                                Remember Me
                                            </label>
                                        </div> -->

                                        <div class="row">
                                            <div class="col pr-2">
                                                <button  class="btn btn-block btn-primary" id="button_login">Login</button>
                                            </div>
                                            <div class="col pl-2">
                                                <a class="btn btn-block btn-link" href="packet.php" id="button_Register">Register</a>
                                            </div>
                                        </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           

        </div>

        
       
        
        
        

    </div>
</div>
<script type="text/javascript">

    $(document).ready(function () {

      
        $("#button_login").click(function () {
            if($("#Username").val() == '' ){
                msg('ປ້ອນ Username','Input Username');    
            } else if($("#Password").val() == '' ){
                msg('ປ້ອນ Password','Input Password');    
            }

            else{
                var Username = $("#Username").val();
                var Password = $("#Password").val();
                
                console.log('s');
                $.ajax({
                url: "php/login.php",
                type: 'POST',
                data: {Username:Username,Password:Password},
                datatype:"text",
                    success: function(data){
                        console.log(data);
                    
                        if(data === 'true'){
                            
                            window.location.replace('message.php');
                        }else{
                            msg('Username ແລະ Password ບໍ່ຖືກຕ້ອງ','Username And Password invalid');
                        
                        } 
                    }
                });
                console.log('data');


            }
            

        });
    });
</script>





</body>
</html>
