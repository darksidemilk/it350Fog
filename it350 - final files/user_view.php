<?php
include 'header.php';
$query="SELECT userId,firstname,lastname,netid FROM User";
$result=mysql_query($query);
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
                <div class="cols-xs-1">
                    <a href="index.php">Home</a>
                </div>
                <div class="col-xs-11">
                    <center><h1>Current Users</h1></center>
                </div>
            </div>
            <div class="row">
                <a href="user_create.php" class="btn btn-md btn-primary" role="button">Add User</a>
            </div>
            <br>
            <div class="row">
                <table class="table table-striped table-bordered table-condensed">
                    <tr>
                        <th>Name</th><th>Netid</th><th></th><th></th><th></th>
                    </tr>
					<?php
					while($row=mysql_fetch_array($result))
					{
						?>
						<tr>
							<td><?=$row['firstname'].' '.$row['lastname']?></td><td><?=$row['netid']?></td><td><a href="contact.php?id=<?=$row['userId']?>" role="button" class="btn btn-info">Contact</a></td><td><a class="btn btn-default" href="user_update.php?id=<?=$row['userId']?>" role="button">Edit</a></td><td><a href="user_delete.php?id=<?=$row['userId']?>" role="button" class="btn btn-danger">Delete</td>
						</tr>
						<?php
					}
					?>
                </table>
            </div>
        </div>
    </body>
</html>
<?php?>