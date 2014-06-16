<html>
<?php
include 'header.php';
$query="SELECT type,byusticker,firstname,lastname,status,dueDate,purchaseRecordId FROM Checkout_item JOIN User on User.userId=Checkout_item.currentUser ORDER BY type";
$result=  mysql_query($query)or die(mysql_error());
?>
<body>
        <div class="container">
            <div class="row">
                <div class="cols-xs-1">
                    <a href="index.php">Home</a>
                </div>
                <div class="col-xs-11">
                    <center><h1>Checkout Items</h1></center>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3">
                    <a href="checkout_create.php" class="btn btn-md btn-primary" role="button">Add Checkout Item</a>
                </div>
                <div class="col-xs-6"></div>
                <div class="col-xs-3">
                    <a href="overdue_view.php" class="btn btn-md btn-primary" role="button">View Overdue Items</a>
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
                            $sticker=$row['byusticker'];
                            $pquery="SELECT date,intendedLocation FROM Purchase_record WHERE id=".$row['purchaseRecordId'];
                            $presult=  mysql_query($pquery);
                            if(mysql_num_rows($presult)>0){
                                $pdata=  mysql_fetch_array($presult);
                                $prec=$pdata['intendedLocation'].': '.$pdata['date'];
                            }
                            else
                            {
                                $prec="Not assigned";
                            }
                            ?>
                    <tr>
                        <td><?=$row['type']?></td><td><?=$sticker?></td><td><?=$username?></td><td><?=status_string($row['status'])?></td><td><?=$row['dueDate']?></td><td><?=$prec?></td><td><a href="checkout_update.php?byusticker=<?=$row['byusticker']?>" class="btn btn-sm btn-default" role="button">Edit</a></td><td><a href="checkout_delete.php?byusticker=<?=$row['byusticker']?>" class="btn btn-sm btn-danger" role="button">Delete</a></td>
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