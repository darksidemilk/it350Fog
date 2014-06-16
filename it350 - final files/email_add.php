<?php
include 'db_connect.php';
$id=$_GET['id'];
if(isset($_GET['email'])){
	$email=mysql_real_escape_string($_GET['email']);
	$user=$_GET['usernum'];
    $query="INSERT INTO Has_email (email,currentuser) VALUES ('$email',$user)";
    mysql_query($query)or die(mysql_error());
	header("Location:contact.php?id=$user");
}else{
    show_form($id);
}
function show_form($id){
$query="SELECT firstname,lastname FROM User where userId=$id";
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
		<form name="eform" method="get" action="">
		<input type="hidden" name="usernum" value="<?=$id?>">
		<div class="row">
			<center><h2>Add Email for <?=$name['firstname'].' '.$name['lastname']?></h2></center>
		</div><br><br>
		<div class="row">
			<div class="col-xs-4">
				<label for="email">Email Address</label>
				<input class="form-control" id="email" name="email">
			</div>
		</div><br>
		<div class="row">
			<div class="col-xs-2">
				<input type="submit" class="form-control" value="Submit">
			</div>
		</div>
		</form>
		</div>
	</body>
</html>
<?php
}
?>