<?php
include 'db_connect.php';
if(!isset($_GET['id']))
{
	header("Location:user_view.php");
}
$id=$_GET['id'];
$query="SELECT firstname,lastname FROM User WHERE userId=$id";
$result=mysql_query($query)or die(mysql_error());
$name=mysql_fetch_array($result);
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
				<div class="col-xs-1">
					<a href="user_view.php">Back</a>
				</div>
				<div class="col-xs-11">
					<center><h1>Contact Information for <?=$name['firstname'].' '.$name['lastname']?></h1></center>
				</div>
			</div><br><br><br>
            <div class="row">
				<div class="col-xs-3">
				<label for="phonet">Phone Numbers</label>
                <table class="table table-striped table-bordered table-condensed" id="phonet">
				<?php
					$pquery="SELECT phone FROM Has_phone WHERE usernum=$id";
					$presult=mysql_query($pquery)or die(mysql_error());
					while($phone=mysql_fetch_array($presult))
					{
						?>
						<tr>
							<td><?=$phone['phone']?></td><td><a href="contact_delete.php?table=Has_phone&var=phone&value=<?=$phone['phone']?>&user=<?=$id?>" class="btn btn-danger" role="button">Delete</td>
						</tr>
						<?php
					}
				?>
                </table>
				</div>
				<div class="col-xs-2">
					<a href="phone_add.php?id=<?=$id?>" class="btn btn-primary" role="button">Add Phone</a>
				</div>
            </div>
			<div class="row">
				<div class="col-xs-4">
				<label for="emailt">Email Addresses</label>
                <table class="table table-striped table-bordered table-condensed" id="emailt">
				<?php
					$equery="SELECT email FROM Has_email WHERE currentuser=$id";
					$eresult=mysql_query($equery)or die(mysql_error());
					while($email=mysql_fetch_array($eresult))
					{
						?>
						<tr>
							<td><?=$email['email']?></td><td><a href="contact_delete.php?table=Has_email&var=email&value=<?=$email['email']?>&user=<?=$id?>" class="btn btn-danger" role="button">Delete</td>
						</tr>
						<?php
					}
				?>
                </table>
				</div>
				<div class="col-xs-2">
					<a href="email_add.php?id=<?=$id?>" class="btn btn-primary" role="button">Add Email</a>
				</div>
            </div>
        </div>
    </body>
</html>