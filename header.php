<?php
session_start();
$language_img= "https://f.ptcdn.info/842/045/000/od8z68jkkuXB1zo7A3U-o.png";
if(isset($_SESSION["language_img"])){
    $language_img = $_SESSION["language_img"];
}
if(isset($_SESSION['token'])){
    $account=' <li class="nav-item dropdown">
                
                    <a href="#" id="dd_user" class="navbar-brand dropdown-toggle" data-toggle="dropdown"><i class="fas fa-user-circle fa-lg"></i> '.$_SESSION['user'].'</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd_user">
                        <a href="message.php" class="dropdown-item" id="profile" >Profile</a>
                        <a href="#" class="dropdown-item" id="logout" onclick="logout()" >Logout</a>
                    </div>
                </li>';
}else{
    $account='<li class="nav-item"><a href="login.php" id="login" class="nav-link" ><i class="fas fa-user-circle"></i> Login </a></li>';
}



if(isset($fix)){
    $fix="fixed-top";
}else{
    $fix=" ";
}

echo '<nav class="navbar navbar-expand navbar-dark bg-dark '.$fix.' shadow ">
            <a class="sidebar-toggle mr-3" href="index.php"><img id="logo" src="http://via.placeholder.com/350x150" alt="Avatar" class="avatar"></a>
            
            

        <ul class="navbar-nav ml-auto">
         
           
            <li class="nav-item"> <a class="navbar-brand" href="index.php" id="home">Home</a></li>
          
            <li class="nav-item dropdown">
                
                    <a href="#" id="category" class="navbar-brand dropdown-toggle" data-toggle="dropdown"> Category </a>
                    <div class="dropdown-menu dropdown-menu-right" id="category_list" aria-labelledby="category_list">

                        
                    </div>
            </li>
            <li class="nav-item"> <a class="navbar-brand" href="information.php" id="information" >Information</a></li>
            <li class="nav-item"><a class="navbar-brand" href="#" id="about" >About</a></li>
            
        </ul>


    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="#" class="nav-link sidebar-toggle" id="search" ><i class="fas fa-search fa-lg"></i> ຄົ້ນຫາ </a></li>
            <li class="nav-item"><a href="#" class="nav-link " ><img onclick="change_language()" id="img_language" src="'.$language_img.'"  height="20" width="25"></a></li>
            <!-- <li class="nav-item"><a href="#" class="nav-link" onclick="change_language_en()"><img src="https://f.ptcdn.info/842/045/000/od8z68jkkuXB1zo7A3U-o.png" alt="LAOS" height="20" width="25"></a></a></li> 
            <li class="nav-item"><a href="inbox.php" class="nav-link"><i class="fa fa-envelope"></i><span class="badge badge-success">5</span> </a></li> -->

            <li class="nav-item dropdown">
                
                    <a href="#" id="Currency" class="navbar-brand dropdown-toggle" data-toggle="dropdown"> ສະກຸນເງີນ </a>
                    <div class="dropdown-menu dropdown-menu-right" id="Currency_list" aria-labelledby="Currency_list">
                        
                        
                    </div>
            </li>

            
            '.$account.'
        </ul>
    </div>
    </nav>';

?>