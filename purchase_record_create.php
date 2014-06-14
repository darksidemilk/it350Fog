<?php
include 'db_connect.php';
if(isset($_GET['cost']))
{
    $date=$_GET['year'].'-'.$_GET['month'].'-'.$_GET['day'];
    $numItems=  mysql_real_escape_string($_GET['numItems']);
    $cost=  mysql_real_escape_string($_GET['cost']);
    $purpose=  mysql_real_escape_string($_GET['purpose']);
    $loc=  mysql_real_escape_string($_GET['location']);
    $query="INSERT INTO Purchase_record (date,numItems,cost,purpose,intendedLocation) VALUES ('$date',$numItems,$cost,'$purpose','$loc')";
    mysql_query($query, $conn)or die(mysql_error());
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
          <form name="p_rec" method="get" role="form">
              <label for="daterow">Date</label>
              <div class="row" id="daterow">
                  <div class="col-xs-1">
                    <select name="month" class="form-control">
                        <?php
                        for($i=0;$i<=12;$i++){
                            if($i==date('m'))
                            {
                                echo "<option selected>$i</option>";
                                continue;
                            }
                            echo "<option>$i</option>";
                        }
                        ?>
                    </select>
                  </div>
                  <div class="col-xs-1">
                    <select name="day" class="form-control">
                        <?php
                        for ($i=1;$i<=31;$i++){
                            if($i==date('d')){
                                echo "<option selected>$i</option>";
                                continue;
                            }
                            echo "<option>$i</option>";
                        }
                        ?>
                    </select>
                  </div>
                  <div class="col-xs-1">
                    <select name="year" class="form-control">
                        <?php
                        $now=date('Y');
                        for($i=$now-5;$i<$now+1;$i++)
                        {
                            if($i==$now){
                                echo "<option selected>$i<option>";
                                continue;
                            }
                            echo "<option>$i</option>";
                        }
                        ?>
                    </select>
                  </div>
              </div>
              <label for="itemform">Number of Items</label>
            <input type="text" id="itemform" name="numItems" class="form-control textformbox"/>
            <label for="costform"> Cost</label>
            <input type="text" name="cost" id="costform" class="form-control textformbox"/>
            <label for="purposeform"> Purpose</label>
            <textarea name="purpose"  rows="2" id="purposeform" class="form-control"></textarea>
            <label for="locform"> Location</label>
            <input type="text" name="location" id="locform" class="form-control textformbox"/>
            <input class="btn btn-default" type="submit"/>
        </form>
    </body>
</html>

<?php
}
?>