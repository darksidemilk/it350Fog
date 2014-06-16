<?php
include 'db_connect.php';
if(isset($_GET['byutag']))
{
    $make=$_GET['make'];
    $tag=$_GET['byutag'];
    $room=$_GET['room'];
    $query="INSERT INTO Projector (make,byuTag,roomName) VALUES ('$make','$tag','$room')";
    echo $query;
    //mysql_query($query,$conn);
}
else
{
   show_form(); 
}

function show_form()
{
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
          <form name="projector" method="get" role="form" action="">
              <div class="row">
                  <div class="col-xs-1">
                      <label for="make">Make</label>
                      <input class="form-control" name="make" id="make">
                  </div>
              </div>
              <div class="row">
                  <div class="col-xs-1">
                      <label for="byutag">BYU Sticker</label>
                      <input class="form-control" name="byutag" id="byutag">
                  </div>
              </div>
              <div class="row">
                  <div class="col-xs-1">
                      <label for="room">Room</label>
                      <select class="form-control" id="room" name="room">
                          <?php
                          $query="SELECT name from Room";
                          $result=  mysql_query($query, $conn);
                          while($row=  mysql_fetch_array($result)){
                              echo '<option>'.$row['name'].'</option>';
                          }
                          ?>
                      </select>
                  </div>
              </div>
              <div class="row">
                  <div class="col-xs-1">
                      <input type="submit" class="btn btn-default" value="Submit">
                  </div>
              </div>
        </form>
    </body>
</html>

<?php
}
?>