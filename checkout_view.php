<?php
$query="SELECT type,byusticker,firstname,lastname,status,dueDate,intendedLocation,date FROM Checkout_item JOIN User on User.userId=Checkout_item.currentUser JOIN Purchase_record on Purchase_record.id=Checkout_item.purchaseRecordId ORDER BY type";
$result=  mysql_query($query);
include 'header.php'; 
?>
<html>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <center><h1>Checkout Items</h1></center>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3">
                    <a href="checkout_create.php" class="btn btn-md btn-primary" role="button">Add Checkout Item</a>
                </div>
                <div class="col-xs-6"></div>
                <div class="col-xs-3">
                    <a href="" class="btn btn-md btn-primary" role="button">View Overdue Items</a>
                </div>
            </div>
            <br>
            <div class="row">
                <table class="table table-striped table-bordered table-condensed">
                    <tr>
                        <th>Type</th><th>BYU Sticker</th><th>Loaned to</th><th>Status</th><th>Date due</th><th>Purchase Record</th><th></th><th></th>
                    </tr>
                    <?php
                        while($row=  mysql_fetch_array($result)){
                            $username=$row['firstname'].' '.$row['lastname'];
$prec=$row['intendedLocation'].': '.$row['date'];
                            ?>
                    <tr>
                        <td><?=$row['type']?></td><td><?=$row['byusticker']?></td><td><?=$username?></td><td><?=status_string($row['status'])?></td><td><?=$row['dueDate']?></td><td><?=$prec?></td><td><a href="checkout_update.php?byusticker=<?=$row['byusticker']?>" class="btn btn-sm btn-default" role="button">Edit</a></td><td><a href="checkout_delete.php?byusticker=<?=$row['byusticker']?>" class="btn btn-sm btn-default" role="button">Delete</a></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>

<?php
function status_string($status){
    switch ($status){
        case 0:return "Returned";
        case 1:return "Loaned";
        case 2: return "Given Away";
        case 3: return "Lost";
        default: return "Undefined";
    }
}
?>