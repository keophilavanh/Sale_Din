<?php

 $user_type = $_SESSION['user_type'];
 $menu='';
    if($user_type == 'Admin'){

        
    $menu = '
        <div class="sidebar sidebar-dark bg-dark">
            <ul class="list-unstyled">
            
                <li ><a href="message.php" id="menu_inbox"><i class="fa fa-envelope"></i> </a></li>
                <li ><a href="product.php" id="menu_product_list"><i class="fab fa-product-hunt "></i> Product Lsit</a></li>
                <li ><a href="information_list.php" id="menu_information"><i class="fas fa-file"></i> Information</a></li>
                <li ><a href="category.php" id="menu_category_list"><i class="fas fa-copyright"></i> Category Lsit</a></li>
                <li ><a href="user.php" id="menu_user_active"><i class="fas fa-user"></i> User Active</a></li>
                <li><a href="change_password.php" id="menu_change_password"> <i class="fas fa-key"></i> Change Password</a></li>

                <li>
                    <a href="#sm_examples" data-toggle="collapse" id="menu_setting">
                        <i class="fas fa-cog"></i> Setting
                    </a>
                    <ul id="sm_examples" class="list-unstyled collapse">
                        <li><a href="system.php" id="menu_config">Config System</a></li>
                        
                        
                    
                    </ul>
                </li>
            
            </ul>
        </div>';

    }elseif($user_type == 'VIP' || $user_type == 'Member'){

        $menu = '
        <div class="sidebar sidebar-dark bg-dark">
            <ul class="list-unstyled">
            
                <li ><a href="inbox.php" id="menu_inbox"><i class="fa fa-envelope"></i>  </a></li>
                <li ><a href="product.php" id="menu_product_list"><i class="fab fa-product-hunt "></i> Product Lsit</a></li>
               
              
                <li><a href="change_password.php" id="menu_change_password"> <i class="fas fa-key"></i> Change Password</a></li>

                
            
            </ul>
        </div>';

    }
    else{

        $menu = '
        <div class="sidebar sidebar-dark bg-dark">
            <ul class="list-unstyled">
            
                <li ><a href="inbox.php" id="menu_inbox"><i class="fa fa-envelope"></i>  </li>
              
               
              
                <li><a href="change_password.php" id="menu_change_password"> <i class="fas fa-key"></i> Change Password</a></li>

                
            
            </ul>
        </div>';

    }
    

        echo $menu;
    
 
    

?>