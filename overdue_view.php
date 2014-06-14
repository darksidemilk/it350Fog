<?php
include 'db_connect.php';
$query="SELECT * FROM [Overdue]";
$result=mysql_query($query, $conn);
while($row=  mysql_fetch_array($result)){
    
}
?>