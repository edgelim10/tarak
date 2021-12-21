<!DOCTYPE html>
<?php
$scode=$_GET['storecode'];
$deyt=$_GET['date'];
	session_start();
	$username=$_SESSION['username'];
	date_default_timezone_set('Asia/Manila');
	$datewithtime=date('D, m/d/y g:i a');
	$pcname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	//$visitor=mysql_query("INSERT INTO visitor (pcname, date, page) VALUES 
	//('$pcname', '$datewithtime', 'home.php')");
	//$datewithtime=date('l, F d Y g:i a');
	$date=date('F d Y');
	$day=date('l');
	$time=date('g:i a');
	$nav=$_GET['nav'];
	//include('total.php');
	//$query_parent = mysql_query("SELECT * FROM itemlist2") or die("Query failed: ".mysql_error());
	//$query_parent2 = mysql_query("SELECT * FROM locations") or die("Query failed: ".mysql_error());
	//include('ubosna.php');
	$host="localhost";
$user="root";
$pass="rootroot";
$db="db_pdo_search2";
$con=mysql_connect($host,$user,$pass);
if (!$con){
	echo"cant connect to database";
}
$connectdb=mysql_select_db($db, $con);
if (!$connectdb){
	echo"no database found";
}
	$success=mysql_query("SELECT * FROM user WHERE username='$username'");
	$go=mysql_num_rows($success);
	if($go <= 0){
	header("location: index.php?nav=loginfirst");
	}
	else{
	if(!isset($username)){
	header("location: index.php?nav=loginfirst");
}
}
?>
<html lang="en">
	<head>
	<title>dsr test</title>
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
    <link href="sieses.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" media="print" href="print.css" />
	<link rel="icon" type="image" href="img/iface2.png">
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	</head>
<body style="font-family:calibri;">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			
		</div>
	</nav>
		<h3 class="text-primary"></h3>
		<div style="
	background: #6396bc;
	font-size:15px;
	width: 100%;
	min-height: 50px;
	/*top:0;*/
	color: #fff;
	position: fixed;">
	<div style="float:left;">
	<!--<a style="color:white;" href="report.php" type="button" class="btn btn-success">DSR per date</a><br />-->
					<a type="button" class="btn btn-success" style="color:white;" href="byweek.php">Overall DSR (Sum per Item)</a>
					<br />
					<a type="button" class="btn btn-success" style="color:white;" href="allstore.php">DSR All Store (Sum per Item)</a>
					<br />
					<a type="button" class="btn btn-success" style="color:white;" href="allstoreperdate.php">DSR Detailed (All Store per Date)</a>
					<br />
					<a type="button" class="btn btn-success" style="color:white;" href="perstoresum.php">DSR per Store (Sum per Item)</a>
					<br />
					<a type="button" class="btn btn-success" style="color:white;" href="perstore.php">DSR per Store</a>
					<br />
					
					<a href="logout.php" style="color:red;" onclick="return window.confirm('Are you sure you want to logout?');"><b>Logout</b></a> / <?php echo $username;?> <i class="icon-signout"></i>
					</div>
	<p style="float:left;margin-left:10px;">80=99 <b>|</b> 136=169 <b>|</b> 160=199 <b>|</b> 200=249 <b>|</b> 225=449 <b>|</b> 240=299 <b>|</b> 263=329 <b>|</b> 280=349 <b>|</b> 320/360=399 <b>
	<br /></b> 360=449 <b>|</b> 400/450=499 <b>|</b> 480/540=599 
		<b>|</b> 530/560=699/749 <b>|</b> 600=749 <b>|</b> 640=799 <b>|</b> 720=799/899 <b>
		<br /></b> 800=999 <b>|</b> 880=1099 <b>|</b> 960=1199 <b>|</b> 1360=1699 <b>|</b> 2400=2999 </p>
	<form method="GET" action="">
				<div class="form-inline" style="margin-left:900px;">
				<table><tr><td>STORE CODE</td><td>DATE</td></tr>
				<tr><td><input type="text" style="width:137px;height:18px;" name="storecode" placeholder="STORE CODE" value="<?php echo $_GET['storecode']; ?>" required></td>
				
				<td><input type="date" name="date" value="<?php echo $_GET['date']; ?>" placeholder="YYYY-MM-DD" required></td>
				<td><input type="submit" style="height:24px;" name="submit" value="submit"/></td>
				<td>
				<?php
				$scc = $_GET['storecode'];
				$maystoreba=mysql_query("SELECT * FROM `table 9` WHERE `store_code`='$scc'");
				$meronnga=mysql_fetch_array($maystoreba);
				$sino=$meronnga['auditor'];
				echo "Auditor: <b style='color:red;'>";
				echo $sino;
				echo"</b>";
				?>
				</td>
				</tr>
				</table>
				</div>
			</form>
		
		<form method="POST" action="">
				<div class="form-inline" style="margin-left:900px;">
				<br />
				<table><tr><td>BRAND</td><td>ITEM</td><td>PRICE</td></tr>
				<tr><td><input type="text" name="brand" placeholder="brand keyword" class="form-control" value="<?php echo $_GET['brand'];?>"/></td>
					<td><input type="search" class="form-control" name="keyword" value="<?php echo $_GET['item'];?>" placeholder="item keyword"/></td>
					<td><input type="search" class="form-control" name="price" value="<?php echo $_GET['price'];?>" placeholder="exact price"/></td>
					<td><button class="btn btn-success" name="search">Search</button>
					<a href="dsr.php?storecode=<?php echo $scode; ?>&date=<?php echo $deyt; ?>" style="color:white;">Clear search</a>
					
					</td></tr>
					<!--<a href="./" style="color:white;">Clear fields</a></td></tr>-->
					</table>
				</div>
			</form>
					
				</div>
		<hr style="border-top:1px dotted #ccc;" />
		<div class="col-md-4">
			<form method="POST" action="insert.php">
				<div class="form-group">
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<table style="float:left;" class='table-striped table-bordered table-hover css-serial' id="dataTables-example" border="1">
		<thead class="alert-info" style="size:12px;">
			<tr style="size:12px;">
			<th>#</th>
			<th>Store Code</th>
			<th>Brand</th>
			<th>Item Name</th>
				<th>Item Code</th>
				<th>Barcode</th>
				<th>SKU</th>
				<th>Qty</th>
				<th>Unit Price</th>
				<th>Amount</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody style="font-size:12px;">
			<?php
$scode=$_GET['storecode'];
$deyt=$_GET['date'];
$host="localhost";
$user="root";
$pass="rootroot";
$db="db_pdo_search2";
$con=mysql_connect($host,$user,$pass);
if (!$con){
	echo"cant connect to database";
}
$connectdb=mysql_select_db($db, $con);
if (!$connectdb){
	echo"no database found";
}
$brand = $_GET['brand'];
				$keyword = $_GET['item'];
				$price = $_GET['price'];
					$query2 = mysql_query("SELECT * FROM cart WHERE store_code='$scode' and date='$deyt' ORDER by id ASC");
					$count=0;
					$sum= 0;
					$sumx= 0;
					$amount= 0;
				while($row = mysql_fetch_array($query2)){
					$sumx += $row['qty'];
					$q=$row['qty'];
					$u=$row['unit_price'];
					$aydi=$row['id'];
					$amount = $q * $u;
					$amountx += $amount;
				$count++;
			?>
			<tr>
				<td></td>
				<td><?php echo $row['store_code']?></td>
				<td><?php echo $row['brand']?></td>
				<td><?php echo $row['item_name']?></td>
				<td><?php echo $row['item_code']?></td>
				<td><?php echo $row['barcode']?></td>
				<td><?php echo $row['sku']?></td>
				<td><?php echo $row['qty']?></td>
				<td><?php echo $row['unit_price']?></td>
				<td><?php echo $amount; ?></td>
				<td><a style="background-color: #199319;color: white;padding: none;text-decoration: none;" href="addqty.php?storecode=<?php echo $scode;?>&date=<?php echo $deyt;?>&productid=<?php echo $row['productid']; ?>&brand=<?php echo $brand;?>&item=<?php echo $keyword;?>&price=<?php echo $price; ?>"> &nbsp;add </a>
				&nbsp;<a style="background-color: red;color: white;padding: none;text-decoration: none;" href="lessqty.php?storecode=<?php echo $scode;?>&date=<?php echo $deyt;?>&productid=<?php echo $row['productid']; ?>&brand=<?php echo $brand;?>&item=<?php echo $keyword;?>&price=<?php echo $price; ?>"> less </a>
				&nbsp;<a onclick="return window.confirm('Delete <?php echo $row['item_name']; ?>? sure ka ba?');" style="background-color: #8B0000;color: white;padding: none;text-decoration: none;" href="del.php?storecode=<?php echo $scode;?>&date=<?php echo $deyt;?>&id=<?php echo $aydi; ?>&brand=<?php echo $brand;?>&item=<?php echo $keyword;?>&price=<?php echo $price; ?>"> delete &nbsp;</a>
				</td>
				<td></td>
				
			</tr>
			
			
			
			<?php
				}
				
			?>
			<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td style="background-color:yellow;"><b>Total:</b></td>
			<td style="background-color:yellow;"><b><?php echo $sumx; ?></b></td>
			<td></td>
			<td style="background-color:yellow;"><b><?php echo $amountx; ?></b></td>
			</tr>
		</tbody>
		
	</table>
	
	
					<!--<label>Brand</label>
					<input type="text" name="firstname" class="form-control" required="required"/>-->
				</div>
				<!--<div class="form-group">
					<label>Lastname</label>
					<input type="text" name="lastname" class="form-control" required="required" />
				</div>
				<div class="form-group">
					<label>Address</label>
					<input type="text" name="address" class="form-control" required="required"/>
				</div>-->
				<!--<center><button name="save" class="btn btn-primary">Go</button></center>-->
			</form>
		</div>
		
		<div class="col-md-8" style="margin-left:900px;">
			<?php if(!ISSET($_POST['search'])){
				?>
			
			<?php
				$brand = $_GET['brand'];
				$keyword = $_GET['item'];
				$price = $_GET['price'];
				$scode=$_GET['storecode'];
$deyt=$_GET['date'];
				if($brand != "" or $keyword != "" or $price !=""){
					echo"<table style='size:12px;' class='table-striped table-bordered table-hover' border='1'>";
		echo"<thead class='alert-info' style='size:12px;'>";
			echo"<tr style='size:12px;'>";
			echo"<th>Brand</th>";
			echo"<th>Item Name</th>";
				echo"<th>Barcode</th>
				<th>Unit Price</th>
				<th>Qty</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody style='font-size:12px;'>";
				if($price == ""){
					$query =mysql_query("SELECT * FROM `table 2` WHERE `item name` LIKE '%$keyword%' and `brand` LIKE '%$brand%'");
				}
				else{
				$query = mysql_query("SELECT * FROM `table 2` WHERE `item name` LIKE '%$keyword%' and `brand` LIKE '%$brand%' and `unit price`=$price");
				}
				while($row=mysql_fetch_array($query)){
			?>
			<form action="addx2.php?storecode=<?php echo $scode;?>&date=<?php echo $deyt;?>&brand=<?php echo $brand;?>&item=<?php echo $keyword;?>&price=<?php echo $price; ?>" method="POST">
			<tr title="<?php echo $row['item code']; if($row['item code'] == ""){echo $row['sku'];}?>">
				<!--<td><input type="text" value="<?php echo $row['brand']?>" name="brandx" readonly></td>
				<td><input type="text" value="<?php echo $row['item name']?>" name="itemnamex" style="width:400px;" readonly></td>
				<td><input type="text" value="<?php echo $row['barcode']?>" name="barcodex" readonly></td>
				<td><input type="text" value="<?php echo $row['unit price']?>" name="unitpricex" style="width:70px;" readonly></td>-->
				<td><?php echo $row['brand']?></td>
				<td><?php echo $row['item name']?></td>
				<td><?php echo $row['barcode']?></td>
				<td><?php echo $row['unit price']?></td>
				<input type="hidden" name="stcode" value="<?php echo $scode;?>">
				<input type="hidden" name="date" value="<?php echo $deyt;?>">
				<input type="hidden" name="itemid" value="<?php echo $row['id'];?>">
				<td><input type="number" value="1" min="1" style="width:50px;" name="qty"></td>
				<td><input type="submit" value="ADD pa more" name="add"></td>
				<!--<td><a style="text-decoration: none;" href="add.php?storecode=<?php echo $storecode; ?>&date=<?php echo $date; ?>&productid=<?php echo $row['id']?>">Pick</a></td>-->
			</tr>
			</form>
			
			
			<?php
			}}}
			?>
		</tbody>
	</table>
			
			<?php include'search.php'?>
		</div>
		
	<?php
	//}
$conn = null;
?>
	</div>
	<script src="js/jquery-3.2.1.min.js"></script>	
<script src="js/bootstrap.js"></script>	
</body>
</html>