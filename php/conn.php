<?php
 
//MySQLi Procedural $connect = mysqli_connect("sql301.epizy.com","epiz_25419664","5ZYSWwpMh9oNp","epiz_25419664_web_sale");
$connect = mysqli_connect("localhost","root","","sale_din");
if (!$connect) {
 die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($connect,"utf8");
 
?>