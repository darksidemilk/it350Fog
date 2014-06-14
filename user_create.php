<?php
include 'db_connect.php';
if(isset($_GET['lastname'])){
    $last=  mysql_real_escape_string($_GET['lastname']);
    $first=  mysql_real_escape_string($_GET['firstname']);
    $netid=  mysql_real_escape_string($_GET['netid']);
    $phone=  mysql_real_escape_string($_GET['phone']);
    $email=  mysql_real_escape_string($_GET['email']);
    $query="INSERT INTO User (firstname,lastname,netid) VALUES ('$first','$last','$netid');";
	mysql_query($query, $conn)or die(mysql_error());
    $query="SELECT userId from User WHERE netid=$netid";
    $result=  mysql_query($query, $conn);
    $row=  mysql_fetch_array($result);
    $id=$row['userId'];
    $query="INSERT INTO Has_phone (userId,phone) VALUES ($id,'$phone')";
    mysql_query($query, $conn)or die(mysql_error());
    $query="INSERT INTO Has_email (userId,email) VALUES ($id,'$email')";
    mysql_query($query, $conn)or die(mysql_error());
}else{
    show_form();
}
function show_form(){
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
                <center><h1>Create A User</h1></center>
            </div>
            <br><br>
            <form name="user" method="get" action="">
                <div class="row">
                    <div class="col-xs-3">
                        <label for="firstname">First Name</label>
                        <input id="firstname" name="firstname" maxlength="50" type="text">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-3">
                        <label for="lastname">Last Name</label>
                            <input id="lastname" name="lastname" maxlength="50" type="text">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-3">
                        <label for="netid">Netid</label>
                        <input id="netid" name="netid" maxlength="20" type="text">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-3">
                        <label for="phone">Phone</label>
                        <input id="phone" name="phone" maxlength="15" type="text">
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
            </form>
        </div>
    </body>
</html>
<?php
}
?>