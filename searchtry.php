<?php
	// require the database connection
	require 'conn.php';
	$prod_id=$_GET['productid'];
$storecode=$_GET['storecode'];
$date=$_GET['date'];
	if(ISSET($_POST['search'])){
?>
 <!-- MetisMenu CSS -->
    <link href="metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" media="print" href="print.css" />
		
	<table style="size:12px;" class='table-striped table-bordered table-hover' border="1">
		<thead class="alert-info" style="size:12px;">
			<tr style="size:12px;">
			<th>Brand</th>
			<th>Item Name</th>
				<th>Barcode</th>
				<th>Unit Price</th>
				<th>Qty</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody style="font-size:12px;">
			<?php
				$brand = $_POST['brand'];
				$keyword = $_POST['keyword'];
				$price = $_POST['price'];
				if($price == ""){
					$query = $conn->prepare("SELECT * FROM `table 2` WHERE `item name` LIKE '%$keyword%' and `brand` LIKE '%$brand%'");
				}
				else{
				$query = $conn->prepare("SELECT * FROM `table 2` WHERE `item name` LIKE '%$keyword%' and `brand` LIKE '%$brand%' and `unit price`=$price");
				}
				$query->execute();
				while($row = $query->fetch()){
			?>
			<form action="addx.php?brand=<?php echo $brand;?>&item=<?php echo $keyword;?>&price=<?php echo $price; ?>" method="POST">
			<tr>
				<!--<td><input type="text" value="<?php echo $row['brand']?>" name="brandx" readonly></td>
				<td><input type="text" value="<?php echo $row['item name']?>" name="itemnamex" style="width:400px;" readonly></td>
				<td><input type="text" value="<?php echo $row['barcode']?>" name="barcodex" readonly></td>
				<td><input type="text" value="<?php echo $row['unit price']?>" name="unitpricex" style="width:70px;" readonly></td>-->
				<td><?php echo $row['brand']?></td>
				<td><?php echo $row['item name']?></td>
				<td><?php echo $row['barcode']?></td>
				<td><?php echo $row['unit price']?></td>
				<input type="hidden" name="stcode" value="<?php echo $storecode;?>">
				<input type="hidden" name="date" value="<?php echo $date;?>">
				<input type="hidden" name="itemid" value="<?php echo $row['id'];?>">
				<td><input type="number" value="1" style="width:50px;" name="qty"></td>
				<td><input type="submit" value="ADD" name="add"></td>
				<!--<td><a style="text-decoration: none;" href="add.php?storecode=<?php echo $storecode; ?>&date=<?php echo $date; ?>&productid=<?php echo $row['id']?>">Pick</a></td>-->
			</tr>
			</form>
			
			
			<?php
				}
			?>
		</tbody>
	</table>
<?php		
	}else{
?>
	<!--<table class="table table-bordered">
		<thead class="alert-info">
			<tr>
			<th>Brand</th>
				<th>Item Name</th>
				<th>Barcode</th>
				<th>Unit Price</th>
			</tr>
		</thead>
		<tbody>
			<?php
				//$query = $conn->prepare("SELECT * FROM `table 2`");
				//$query->execute();
				//while($row = $query->fetch()){
			?>
			<tr>
			<td><?php //echo $row['brand']?></td>
				<td><?php //echo $row['item name']?></td>
				<td><?php //echo $row['barcode']?></td>
				<td><?php //echo $row['unit price']?></td>
			</tr>
			
			
			<?php
				}
			?>
		</tbody>
	</table>
<?php
	//}
$conn = null;
?>