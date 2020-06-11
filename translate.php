<?php

session_start();

$_SESSION["language_img"] = 'https://f.ptcdn.info/842/045/000/od8z68jkkuXB1zo7A3U-o.png';

if(isset($_POST["language"])){

  if($_POST["language"] == 'EN'){
    $_SESSION['language'] = 'EN';
    include 'language/language_en.php';
    $_SESSION["language_img"] = 'https://upload.wikimedia.org/wikipedia/commons/5/56/Flag_of_Laos.svg';

  }else if($_POST["language"] == 'THAI'){

    $_SESSION['language'] = 'THAI';
    include 'language/language_thai.php';
    $_SESSION["language_img"] = 'https://upload.wikimedia.org/wikipedia/commons/a/a9/Flag_of_Thailand.svg';

  }
  
  else{
    $_SESSION['language'] = 'LA';
    include 'language/language_lao.php';
    $_SESSION["language_img"] = 'https://f.ptcdn.info/842/045/000/od8z68jkkuXB1zo7A3U-o.png';
  }
  echo json_encode($translate);

}








?>