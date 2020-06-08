<?php
session_start();
$language_img= "https://f.ptcdn.info/842/045/000/od8z68jkkuXB1zo7A3U-o.png";
if(isset($_SESSION["language_img"])){
    $language_img = $_SESSION["language_img"];
}
if(isset($_SESSION['token'])){
    $account=' <div class="nav-item dropdown">
                
                    <a href="#" id="dd_user" class="navbar-brand dropdown-toggle" data-toggle="dropdown"><i class="fas fa-user-circle fa-lg"></i> '.$_SESSION['user'].'</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd_user">
                        <a href="message.php" class="dropdown-item" id="profile" >Profile</a>
                        <a href="#" class="dropdown-item" id="logout" onclick="logout()" >Logout</a>
                    </div>
                </div>';
}else{
    $account=' 
            <a href="login.php" class="nav-item navbar-link text-light " id="login" ><i class="fas fa-user-circle"></i> Login </a>';
}



   echo  '<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow">
        <a class=" mr-3" href="index.php"><img id="logo" src="http://via.placeholder.com/350x150" alt="Avatar" class="avatar"></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"> 
            <a class="navbar-brand" href="index.php" id="home">Home</a>
        </li>
          
        <li class="nav-item dropdown">
          
              <a href="#" id="category" class="navbar-brand dropdown-toggle" data-toggle="dropdown"> Category </a>
              <div class="dropdown-menu dropdown-menu-right" id="category_list" aria-labelledby="category_list">

                  
              </div>
        </li>
        <li class="nav-item"> <a class="navbar-brand" href="information.php" id="information" >Information</a></li>
        <li class="nav-item"><a class="navbar-brand" href="about.php" id="about" >About</a></li>
      </ul>
      <form class="form-inline my-2 my-lg-0">

        <a href="#" class="nav-link sidebar-toggle" id="search" ><i class="fas fa-search fa-lg"></i> ຄົ້ນຫາ </a>
        <a href="#" class="nav-link " ><img onclick="change_language()" id="img_language" src="'.$language_img.'"  height="20" width="25"></a>
        <div class="nav-item dropdown">
                
            <a href="#" id="Currency" class="navbar-brand dropdown-toggle" data-toggle="dropdown"> ສະກຸນເງີນ </a>
            <div class="dropdown-menu dropdown-menu-right" id="Currency_list" aria-labelledby="Currency_list">
                
                
            </div>
        </div>
       
        
            '.$account.'
      </form>
    </div>
  </nav>';

?>