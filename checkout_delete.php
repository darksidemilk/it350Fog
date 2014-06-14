<?php
if(isset($_GET['byusticker'])){
    $sticker=$_GET['byusticker'];
    $deathwarrant="DELETE FROM Checkout_items WHERE byusticker='$sticker'";
}else{
    print "No id detected";
}