<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<title>dsr test - report</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>

	<div class="col-md-3"></div>
	<div class="col-md-6 well" style="width:100%;">
		<h3 class="text-primary">DSR per Store (All Store)</h3>
		<a href="dsr.php">Back</a>
		<hr style="border-top:1px dotted #000;"/>
		<form class="form-inline" method="POST" action="">
			<label>Date:</label>
			<input type="date" class="form-control" placeholder="Start"  name="date1" value="<?php echo isset($_POST['date1']) ? $_POST['date1'] : '' ?>" />
			<label>To</label>
			<input type="date" class="form-control" placeholder="End"  name="date2" value="<?php echo isset($_POST['date2']) ? $_POST['date2'] : '' ?>"/>
			<button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"></span></button> <a href="allstore.php" type="button" class="btn btn-success"><span class = "glyphicon glyphicon-refresh"><span></a>
		</form>
		<br /><br />
		<div class="table-responsive">	
			<table class="table table-bordered">
				<thead class="alert-info">
					<tr>
						<th>Product #</th>
			<th>Store Code</th>
			<th>Brand</th>
			<th>Item Name</th>
				<th>Item Code</th>
				<th>Barcode</th>
				<th>SKU</th>
				<th>Total Qty</th>
				<th>Unit Price</th>
				<th>Amount</th>
				
					</tr>
				</thead>
				<tbody>
					<?php include'range5.php'?>	
				</tbody>
			</table>
		</div>	
	</div>
</body>
</html>