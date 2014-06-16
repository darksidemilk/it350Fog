<?php
include 'header.php';
?>
<body>
	<div class="container">
		<div class="row">
                    <div class="cols-xs-1">
                        <a href="index.php">Home</a>
                    </div>
                    <div class="col-xs-11">
                            <center><h1>Purchase Records</h1></center>
                    </div>
		</div>
		<br>
		<br>
		<div class='row'>
			<div class='col-xs-2'>
				<a href="purchase_record_create.php" class="btn btn-primary" role="button">Add Purchase Record</a>
			</div>
                    <div class="col-xs-7"></div>
                    <div class="col-xs-3">
                        <form method="get" action="purchase_record_search.php">
                            <input type="text" style="border-radius:5px;padding:5px 5px;" name="keyword" placeholder="Search for...">
                            <input type="submit"  class="btn btn-success" value="Search">
                        </form>
                    </div>
		</div>
		<br>
		<div class="row">
			<table class="table table-striped table-bordered table-condensed">
				<tr>
					<th>Date</th><th>Purpose</th><th>Location</th><th></th><th></th>
				</tr>
				<?php
					$query="SELECT date,purpose,intendedLocation,id from Purchase_record ORDER BY date DESC";
					$result=mysql_query($query)or die(mysql_error());
					while($row=mysql_fetch_array($result))
					{
						?>
							<tr>
								<td><?=$row['date']?></td><td><?=$row['purpose']?></td><td><?=$row['intendedLocation']?></td><td><a href="purchase_record_update.php?id=<?=$row['id']?>" class="btn btn-default" role="button">Edit</a></td><td><a href="purchase_record_delete.php?id=<?=$row['id']?>" role="button" class="btn btn-danger">Delete</a></td>
							</tr>
						<?php
					}
				?>
			</table>
		</div>