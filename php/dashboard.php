<?php
include_once('conn.php');
$token = json_decode(base64_decode($_SESSION['token']));
$dashboard ='';

$inbox = 0;
$view = 0;
$product_total = 0;


$sql_view = "SELECT Sum(view) AS view FROM product ";
$sql_product_total = "SELECT * FROM product ";
$sql_inbox = "SELECT * FROM inbox ";


if($_SESSION["user_type"] == 'VIP' || $_SESSION["user_type"] == 'Member'){
    $sql_view.="WHERE `user_id`=".$token->id;
    $sql_product_total.="WHERE `user_id`=".$token->id;
    $sql_inbox.="WHERE `user_id`=".$token->id;
}

$product_total = mysqli_num_rows(mysqli_query($connect, $sql_product_total));
$inbox = mysqli_num_rows(mysqli_query($connect, $sql_inbox));
$row = mysqli_fetch_array(mysqli_query($connect, $sql_view));
$view = $row['view'];



if(isset($_SESSION["user_type"])){
    if($_SESSION["user_type"] == 'VIP' || $_SESSION["user_type"] == 'Member' || $_SESSION["user_type"] == 'Admin' ){



        $dashboard=' <h2 class="mb-4"> Packet '.$_SESSION["user_type"].'</h2>

                    <div class="row mb-4">
                        <div class="col-md">
                            <div class="d-flex border">
                                <div class="bg-primary text-light p-4">
                                    <div class="d-flex align-items-center h-100">
                                        <!-- <i class="fa fa-3x fa-fw fa-cog"></i> -->
                                        <i class="fa fa-envelope  fa-7x"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 bg-white p-4">
                                    <h2 class="text-uppercase text-secondary mb-0" id="message_total">Message</h2>
                                    <h3 class="font-weight-bold mb-0">'.$inbox.'</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="d-flex border">
                                <div class="bg-success text-light p-4">
                                    <div class="d-flex align-items-center h-100">
                                        <i class="fas fa-eye fa-7x"></i>
                                        
                                    </div>
                                </div>
                                <div class="flex-grow-1 bg-white p-4">
                                    <h2 class="text-uppercase text-secondary mb-0" id="view_total" >View Product</h2>
                                    <h3 class="font-weight-bold mb-0">'.$view.'</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="d-flex border">
                                <div class="bg-danger text-light p-4">
                                    <div class="d-flex align-items-center h-100">
                                        <i class="fab fa-product-hunt fa-7x"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 bg-white p-4">
                                    <h2 class="text-uppercase text-secondary mb-0" id="product_total">Product Total</h2>
                                    <h3 class="font-weight-bold mb-0">'.$product_total.' </h3>
                                </div>
                            </div>
                        </div>
                    
                    </div>';
    }

    
}else{
    $dashboard ='';
}

echo $dashboard ;


?>