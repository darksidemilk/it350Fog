<?php
include 'db_connect.php';
if(isset($_GET['id']))
{
    $query='DELETE FROM Purchase_record WHERE id='.$_GET['id'];
    mysql_query($query)or die(mysql_error());
}
header("Location:purchase_record_view.php");
?>