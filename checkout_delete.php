<?php
include 'db_connect.php';
if(isset($_GET['byusticker'])){
    $sticker=$_GET['byusticker'];
    $deathwarrant="DELETE FROM Checkout_item WHERE byusticker='$sticker'";
mysql_query($deathwarrant)or die(mysql_error());
header("Location:checkout_view.php");
}else{
    print "No id detected";
}
