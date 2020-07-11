
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
        <?php include './php/dashboard.php';  ?>

        <div class="card mb-4">
                <div class="card-header bg-white font-weight-bold">        
                    <h4 id="inbox_titel_card">ອິນບ໋ອກ</h4>
                </div>
                <div class="card-body">
                <div align="right">   
                    <?php 
                            if($_SESSION['user_type'] !== 'Admin'){
                                echo '<a href="#" class="btn btn-success" title="Send Message" name="add" id="Send_Message_to_admin" > Send Message to Admin</a>';
                            }
                            ?>
                    
                    <h1></h1>   
                </div>
                
                <table id="example" class="table table-hover" cellspacing="0" width="100%">
                
                <thead>
                <tr>
                    <th id="inbox_table_code">ລະຫັດ</th>
                    <th id="inbox_table_name">ຊື່ແລະນາມສະກຸນ</th>
                    <th id="inbox_table_message">ຂໍ້ຄວາມ</th>
                    <th id="inbox_table_phone">ເບີໂທສັບ</th>
                    <th >Action</th>
                   
                   
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>

        <div id="add_data_Modal" class="modal fade">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 id="send_message_titel" class="modal-title">ສົງຂໍ້ຄວາມ</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                    <div class="modal-body">
                    <form method="post" id="insert_form" autocomplete="off">
                                <div class="form-group row">
                                        
                                        <div class="col-sm-12">
                                            <label id="message_text" ></label>
                                            <textarea id="text_message" class="form-control" rows="3"  ></textarea>
                                        </div>
                                </div>
                                <input type="hidden" name="vendor_id" id="vendor_id" />
                                    <button type="submit" name="insert" id="send_message"  class="btn btn-success" >Send</button>
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

           
            
            var dataTable = $('#example').DataTable({
                "processing":true,
                "serverSide":true,
                "responsive": true,
                "order":[],
                "ajax":{
                url:"php/inbox/select.php",
                type:"POST"
               
                }

            });

           

            $('#Send_Message_to_admin').click(function () {
               
               $('#add_data_Modal').modal('show');
               $('#insert_form')[0].reset();
           
                 
            });

            
            
            $('#insert_form').on("submit", function(event){  
                event.preventDefault();  
                
                    if($('#text_message').val() == '')  
                    {  
                        msg('ປ້ອນຂໍ້ຄວາມ','Enter message');
                    } 
                    else  
                    {  
                        var name = "<?php echo $_SESSION['user'];?>";
                        var user_id = "<?php echo $_SESSION['user_id'];?>";
                        var vendor_id = $('#vendor_id').val();

                        if(vendor_id == ''){
                            vendor_id = -1;
                        
                        }else{
                            user_id='';
                        }

                        var phone = '';
                        var message = $('#text_message').val();



                                console.log('text_name');
                                    $.ajax({  
                                                url:"php/inbox/add_inbox.php",  
                                                method:"POST",  
                                                data:{name:name,phone:phone,message:message,vendor_id:vendor_id,user_id:user_id},  
                                                dataType:"json",  
                                                success:function(data){  
                                                    if(data.status == 'ok'){
                                                       
                                                        $('#text_message').val('');
                                                        msg(data.msg,data.msg);
                                                      

                                                    }else{
                                                        msg(data.msg,data.msg);
                                                    }
                                                    
                                                }
                                            });

                        
                    }  
                });
  

                $(document).on('click', '.reply', function(){  
                    var vendor_id = $(this).attr("id");  
                    $('#add_data_Modal').modal('show');
                    $('#insert_form')[0].reset();
                    $('#vendor_id').val(vendor_id);
                
                  
                }); 

        });
</script>


