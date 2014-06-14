<?php
$database="localhost";
$username="collin";
$password="chang3m3";
$conn=mysql_connect($database,$username,$password)or die(mysql_error());
mysql_select_db("fog")or die(mysql_error());
    
?>