<?php
 
//MySQLi Procedural
$connect = mysqli_connect("localhost","root","","sale_din");
if (!$connect) {
 die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($connect,"utf8");
 
?>