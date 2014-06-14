<?php
include 'db_connect.php';
$query="SELECT byusticker,date FROM Checkout_items";
$result=  mysql_query($query, $conn);
while($row=  mysql_fetch_array($result)){
    $now=date('Y-m-d');
    $date=$row['dueDate'];
    $diff=date_difference($date,$now);
    if($diff>=0){
        $diff=0;
    }else{
        $diff*=-1;
    }
    $query="UPDATE Checkout_items SET amountOverdue=$diff WHERE byusticker='".$row['byusticker']."'";
}
function date_difference($date1,$date2){
    return floor((strtotime($date1)-  strtotime($date2))/(24*60*60));
}
?>