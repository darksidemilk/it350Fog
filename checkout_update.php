<?php
include 'db_connect.php';
if(isset($_GET['type']))
{
    $type=$_GET['type'];
    $sticker=$_GET['byusticker'];
    $user=$_GET['userid'];
    $status=$_GET['status'];
    $purchase=$_GET['prec'];
    
    $now=date('Y-m-d');
    $year=$_GET['year'];
    $month=$_GET['month'];
    $day=$_GET['day'];
    $date="$year-$month-$day";
    $diff=date_difference($date,$now);
    if($diff>=0){
        $diff=0;
    }else{
        $diff*=-1;
    }
	$test="SELECT * FROM Checkout_item WHERE byusticker='$sticker'";
	$result=mysql_query($test);
	$count=mysql_num_rows($result);
if($count>0){
	$query="UPDATE Checkout_item SET type='$type',currentUser=$user,status=$status,dueDate='$date',amountOverdue=$diff,purchaseRecordId=$purchase WHERE byusticker='$sticker'";
}
else
{
$query="INSERT INTO Checkout_item (type,byusticker,currentUser,status,dueDate,amountOverdue,purchaseRecordId) VALUES ('$type','$sticker',$user,$status,'$date',$diff,$purchase)";
}
    
echo $query;
    mysql_query($query)or die(mysql_error());
header("Location:checkout_view.php");
}
else
{
   show_form($_GET['byusticker']); 
}

function show_form($id)
{
    $query="SELECT * FROM Checkout_item WHERE byusticker='$id'";
    $data=mysql_fetch_array(mysql_query($query));
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
                <center><h1>Update Checkout Item</h1></center>
            </div>
          <form name="chckout" method="get" role="form" action="">
              <div class="row">
                  <div class="col-xs-3">
                        <label for="type">Type</label>
                        <input type="text" class="form-control" id="type" value="<?=$data['type']?>"name="type">
                  </div>
              </div>
              <br>
              <div class="row">
                  <div class="col-xs-3">
                      <label for="byustick">BYU Sticker #</label>
                      <input type="text" value="<?=$data['byusticker']?>" class="form-control" id="byustick" name="byusticker">
                  </div>
              </div>
              <br>
              <div class="row">
                  <div class="col-xs-3">
                      <label for="user">User</label>
                      <select class="form-control" id="user" name="userid">
                          <?php
                            $query="SELECT userId,firstname,lastname FROM User ORDER BY lastname,firstname";
                            $result=  mysql_query($query);
                            while($row=mysql_fetch_array($result)){
                                if($data['currentUser']==$row['userId']){
                                    echo "<option selected value='".$row['userId']."'>".$row['firstname']." ".$row['lastname']."</option>";
					continue;
                                }
                                echo "<option value='".$row['userId']."'>".$row['firstname']." ".$row['lastname']."</option>";
                            }
                          ?>
                      </select>
                  </div>
              </div>
              <br>
                 <label for="date">Due Date</label>
              <div class="row" id="date">
                  <div class="col-xs-2">
                          <select class="form-control" name="month">
                              <?php
                              $datearray=  explode('-', $data['dueDate']);
                              for($i=1;$i<=12;$i++){
                                  if($i==$datearray[1]){
                                    echo "<option selected>$i</option>";
					continue;
                                  }
                                  echo "<option>$i</option>";
                              }
                              ?>
                          </select>
                  </div>
                  <div class="col-xs-2">
                      <select class="form-control" name="day">
                              <?php
                              for($i=1;$i<31;$i++){
                                  if($i==$datearray[2])
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
                     <select class="form-control" name="year">
                         <?php
                         $now=$datearray[0];
                         for($i=$now-2;$i<$now+2;$i++){
                             if($i==$now){
                                 echo "<option selected>$i</option>";
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
                     <div class="col-xs-2">
                         <label for="status">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <?php
                                    //ORDER MATTERS!
                                    $stats= array("Returned","Loaned","Given","Lost");
                                    foreach($stats as $key=>$value){
                                        if($key==$data['status']){
                                            echo "<option selected value='$key'>$value</option>";
						continue;
                                        }
                                        echo "<option value='$key'>$value</option>";
                                    }
                                    ?>
                             </select>
                        </div>
                 </div>
                  <br>
                 <div class="row">
                     <div class="col-xs-2">
                         <label for="prec">Purchase Record</label>
                         <select id="prec" name="prec">
                             <?php
                             $query="SELECT id,date,purpose,intendedLocation FROM Purchase_record";
                             $result=mysql_query($query);
                             while($row=  mysql_fetch_array($result)){
                                 if($data['purchaseRecordId']==$row['id']){
                                    echo "<option selected value='".$row['id']."'>".$row['intendedLocation'].": ".$row['date']."</option>";    
                                 }
                                 echo "<option value='".$row['id']."'>".$row['intendedLocation'].": ".$row['date']."</option>";
                             }
                             ?>
                         </select>
                     </div>
                 </div>
                  <br>
                 <div class="row">
                     <input style="margin-left:20px;" class="btn btn-default btn-lg" type="submit" value="Submit">
                 </div>
        </form>
        </div>
    </body>   
</html>

<?php
}

function date_difference($date1,$date2){
    return floor((strtotime($date1)-  strtotime($date2))/(24*60*60));
}
?>