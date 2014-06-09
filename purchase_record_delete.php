<?php
include 'db_connect.php';
if(isset($_GET['id']))
{
    $query='DELETE FROM Purchase_record WHERE id='.$_GET['id'];
    mysql_query($query,$conn)or die(mysql_error());
}
?>