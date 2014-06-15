<?php
include 'header.php';
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
                        <th>Name</th><th></th><th></th>
                    </tr>
                    <tr>
                        <td>Bruce Wayne</td><td><a href="user_update.php"   class="btn btn-default btn-sm active" role="button">Edit</a></td><td><a href="user_delete.php"  class="btn btn-default btn-sm active" role="button"> Delete</a></td>
                    </tr>
                    <tr>
                        <td>Alfred Pennysworth</td><td><a href=""   class="btn btn-default btn-sm active" role="button">Edit</a></td><td><a href=""  class="btn btn-default btn-sm active" role="button"> Delete</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>
<?php?>