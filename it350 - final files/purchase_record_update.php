<?php
include 'header.php';
if(isset($_GET['newid']))
{
    $date=$_GET['year'].'-'.$_GET['month'].'-'.$_GET['day'];
    $numItems=  mysql_real_escape_string($_GET['numItems']);
    $cost=  mysql_real_escape_string($_GET['cost']);
    $purpose=  mysql_real_escape_string($_GET['purpose']);
    $loc=  mysql_real_escape_string($_GET['location']);
    $query="UPDATE Purchase_record SET date='$date',numItems=$numItems,cost=$cost,purpose='$purpose',intendedLocation='$loc' WHERE id=".$_GET['newid'];
    mysql_query($query)or die(mysql_error()); 
	header("Location:purchase_record_view.php");
}
 elseif(isset($_GET['id']))
 {
     show_form($_GET['id']);
 }
 
 function show_form($id)
{
     $query="SELECT date,numItems,cost,purpose,intendedLocation from Purchase_record WHERE id=$id";
     $result=  mysql_query($query);
     $data=  mysql_fetch_array($result);
     $date=  explode('-', $data['date']);
    ?>
<html>
    <body>
		<div class='container'>
			<div class="row">
				<center><h1>Update Purchase Record</h1></center>
			</div>
			<br>
          <form name="p_rec" method="get" role="form">
		  <input type="hidden" name="newid" value="<?=$id?>">
              <label for="daterow">Date</label>
              <div class="row" id="daterow">
                  <div class="col-xs-2">
                    <select name="month" class="form-control">
                        <?php
                        for($i=1;$i<=12;$i++){
                            if($i==$date[1])
                            {
                                echo "<option selected>$i</option>";
                                continue;
                            }
                            echo "<option>$i</option>";
                        }
                        ?>
                    </select>
                  </div>
                  <div class="col-xs-2">
                    <select name="day" class="form-control">
                        <?php
                        for ($i=1;$i<=31;$i++){
                            if($i==$date[2]){
                                echo "<option selected>$i</option>";
                                continue;
                            }
                            echo "<option>$i</option>";
                        }
                        ?>
                    </select>
                  </div>
                  <div class="col-xs-2">
                    <select name="year" class="form-control">
                        <?php
                        $now=$date[0];
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
			  <br>
			  <div class="row">
				<div class="col-xs-4">
					<label for="itemform">Number of Items</label>
					<input type="text" value="<?=$data['numItems']?>" id="itemform" name="numItems" class="form-control textformbox"/>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-xs-4">
					<label for="costform"> Cost</label>
					<input type="text" value="<?=$data['cost']?>" name="cost" id="costform" class="form-control textformbox"/>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-xs-4">
					<label for="purposeform"> Purpose</label>
					<textarea name="purpose"  rows="2" id="purposeform" class="form-control"><?=$data['purpose']?></textarea>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-xs-4">
					<label for="locform"> Location</label>
					<input type="text" value="<?=$data['intendedLocation']?>" name="location" id="locform" class="form-control textformbox"/>
				</div>
			</div>
			<br>
			<div class='row'>
				<div class='col-xs-2'>
					<input class="btn btn-default" type="submit"/>
				</div>
			</div>
        </form>
		</div>
    </body>
</html>
<?php
}
?>