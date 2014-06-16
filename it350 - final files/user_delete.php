<?php
include 'db_connect.php';
if(isset($_GET['id'])){
$query="DELETE FROM User WHERE userId=".$_GET['id'];
mysql_query($query)or die(mysql_error());
header("Location:user_view.php");
}
?>