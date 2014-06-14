<?php
include 'db_connect.php';
$id=$GET['id'];
if(isset($_GET['lastname'])){
    $last=  mysql_real_escape_string($GET['lastname']);
    $first=  mysql_real_escape_string($GET['firstname']);
    $netid=  mysql_real_escape_string($GET['netid']);
    $phone=  mysql_real_escape_string($GET['phone']);
    $email=  mysql_real_escape_string($GET['email']);
    $query="UPDATE User SET firstname='$first',lastname='$last',netid='$netid' WHERE userId=$id";
    mysql_query($query, $conn)or die(mysql_error());
    $query="UPDATE Has_phone SET phone='$phone' WHERE userId=$id";
    mysql_query($query, $conn)or die(mysql_error());
    $query="UPDATE Has_email SET email='$email' WHERE userId=$id";
    mysql_query($query, $conn)or die(mysql_error());
}else{
    show_form($id);
}
function show_form($id){
    $query="SELECT firstname,lastname,netid FROM User WHERE userId=$id";
    $result=  mysql_query($query, $conn);
    $data=  mysql_fetch_array($result);
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
                <center><h1>Update User</h1></center>
            </div>
            <br><br>
            <form name="user" method="get" action="">
                <div class="row">
                    <div class="col-xs-3">
                        <label for="firstname">First Name</label>
                        <input id="firstname" value="<?=$data['firstname']?>" name="firstname" maxlength="50" type="text">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-3">
                        <label for="lastname">Last Name</label>
                            <input id="lastname" value="<?=$data['lastname']?>" name="lastname" maxlength="50" type="text">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-3">
                        <label for="netid">Nedid</label>
                        <input id="netid" value="<?=$data['netid']?>" name="netid" maxlength="20" type="text">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-3">
                        <label for="phone">Phone</label>
                        <input id="phone" value="" name="phone" maxlength="15" type="text">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-3">
                        <label for="email">Email</label>
                        <input id="email" name="email" maxlength="15" type="text">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-3">
                        <input type="submit" value="Submit" class="btn btn-md btn-default">
                    </div>
                </div>
                <input type="hidden" value="<?=$id?>" name="id">
            </form>
        </div>
    </body>
</html>
<?php
}
?>