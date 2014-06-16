<?php
include 'db_connect.php';
$query='DELETE FROM '.$_GET['table'].' WHERE '.$_GET['var'].'=\''.$_GET['value'].'\'';
mysql_query($query)or die(mysql_error());
header("Location:contact.php?id=".$_GET['user']);