<?php
include 'header.php';
if(!isset($_GET['id'])){
     die('No id found');
}
$query="SELECT date,numItems,cost,purpose,intendedLocation from Purchase_record WHERE id=$id";
$result=  mysql_query($query, $conn);
$data=  mysql_fetch_array($result);
?>
<table>
    <tr>
        <td>
            Date:
        </td>
        <td>
            <?=$data['date']?>
        </td>
    </tr>
    <tr>
        <td>
            Number of Items:
        </td>
        <td>
            <?=$data['numItems']?>
        </td>
    </tr>
    <tr>
        <td>
            Cost: 
        </td>
        <td>
            <?=$data['cost']?>
        </td>
    </tr>
    <tr>
        <td>
            Purpose:
        </td>
        <td>
            <?=$data['purpose']?>
        </td>
    </tr>
    <tr>
        <td>
            Intended Location:
        </td>
        <td>
            <?=$data['intendedLocation']?>
        </td>
    </tr>
</table>