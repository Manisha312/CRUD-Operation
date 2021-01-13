<?php
//mysql Connection
$dbserver="localhost";
$dbuser="root";
$dbpass="";
$db="college";
$conn=mysqli_connect($dbserver,$dbuser,$dbpass,$db) or die('Mysql Connection Error:'.mysqli_connect_error());

?>