<?php
include 'header.php';
$keyword=$_GET['keyword'];
?>
<body>
	<div class="container">
		<div class="row">
                    <div class="cols-xs-1">
                        <a href="index.php">Home</a>
                    </div>
                    <div class="col-xs-11">
                        <center><h1>Purchase Records<br><small>with "<?=$keyword?>"</small></h1></center>
                    </div>
		</div>
		<br>
		<br>
		<div class='row'>
			<div class='col-xs-2'>
				<a href="purchase_record_create.php" class="btn btn-primary" role="button">Add Purchase Record</a>
			</div>
                    <div class="col-xs-8">
                    </div>
                    <div class="col-xs-2">
                        <a href="purchase_record_view.php" class="btn btn-default" role="button">Show All Purchase Records</a>
                    </div>
		</div>
		<br>
		<div class="row">
			<table class="table table-striped table-bordered table-condensed">
				<tr>
					<th>Date</th><th>Purpose</th><th>Location</th><th></th><th></th>
				</tr>
				<?php
					$query="SELECT date,purpose,intendedLocation,id from Purchase_record WHERE purpose LIKE '%$keyword%' OR intendedLocation LIKE '%$keyword%' ORDER BY date DESC";
					$result=mysql_query($query)or die(mysql_error());
					while($row=mysql_fetch_array($result))
					{
                                            $purpose=replaceall($keyword,$row['purpose']);//str_replace("$keyword","<span style='background-color:#FFFF99;'>$keyword</span>",$row['purpose']);
                                            $loc=replaceall($keyword,$row['intendedLocation']);  //str_replace("$keyword","<span style='background-color:#FFFF99;'>$keyword</span>",$row['intendedLocation']);
						?>
							<tr>
								<td><?=$row['date']?></td><td><?=$purpose?></td><td><?=$loc?></td><td><a href="purchase_record_update.php?id=<?=$row['id']?>" class="btn btn-default" role="button">Edit</a></td><td><a href="purchase_record_delete.php?id=<?=$row['id']?>" role="button" class="btn btn-danger">Delete</a></td>
							</tr>
						<?php
					}
				?>
			</table>
		</div>
<?php
function replaceall($keyword,$string){
    $final=str_replace("$keyword","<span style='background-color:#FFFF99;'>$keyword</span>",$string);
    $keyword=  strtolower($keyword);
    $final=str_replace("$keyword","<span style='background-color:#FFFF99;'>$keyword</span>",$final);
    $keyword=  ucfirst($keyword);
    $final=str_replace("$keyword","<span style='background-color:#FFFF99;'>$keyword</span>",$final);
    $keyword=  strtoupper($keyword);
    $final=str_replace("$keyword","<span style='background-color:#FFFF99;'>$keyword</span>",$final);
    return $final;
}
?>