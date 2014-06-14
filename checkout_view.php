<?php
include 'db_connect.php';
$query="SELECT * FROM Checkout_item";
$result=  mysql_query($query, $conn);
?>
<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
    </head>
    <body>
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
                            $userquery='SELECT firstname, lastname from User WHERE userId='.$row['currentUser'];
                            $userresult=  mysql_query($query, $conn);
                            $userarray=  mysql_fetch_array($userresult);
                            $username=$userarray['firstname'].' '.$userarray['lastname'];
                            ?>
                    <tr>
                        <td><?=$row['type']?></td><td><?=$row['byusticker']?></td><td><?=$username?></td><td><?=status_string($row['status'])?></td><td><?=$row['dueDate']?></td><td>Purchase Record</td><td><a href="checkout_update.php" class="btn btn-sm btn-default" role="button">Edit</a></td><td><a href="checkout_delete.php" class="btn btn-sm btn-default" role="button">Delete</a></td>
                    </tr>
                    <?
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
        case 2: return "Given";
        case 3: return "Lost";
        default: return "Undefined";
    }
}
?>