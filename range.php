<?php
	require 'conn.php';
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
	date_default_timezone_set('Asia/Manila');
	if(ISSET($_POST['search'])){
		$date1 = date("Y-m-d", strtotime($_POST['date1']));
		$date2 = date("Y-m-d", strtotime($_POST['date2']));
		$query=mysql_query("SELECT * FROM cart WHERE date(date) BETWEEN '$date1' AND '$date2'") or die(mysqli_error());
		$row=mysql_num_rows($query);
		if($row>0){
			while($fetch=mysql_fetch_array($query)){
?>
	<tr>
		<td><?php echo $fetch['productid']?></td>
		<td><?php echo $fetch['store_code']?></td>
		<td><?php echo $fetch['brand']?></td>
		<td><?php echo $fetch['item_name']?></td>
		<td><?php echo $fetch['item_code']?></td>
		<td><?php echo $fetch['barcode']?></td>
		<td><?php echo $fetch['sku']?></td>
		<td><?php echo $fetch['qty']?></td>
		<td><?php echo $fetch['unit_price']?></td>
		<td><?php $amount= $fetch['unit_price'] * $fetch['qty']; echo $amount;?></td>
		<td><?php echo $fetch['date']?></td>
	</tr>
<?php
			}
		}else{
			echo'
			<tr>
				<td colspan = "4"><center>Record Not Found</center></td>
			</tr>';
		}
	}
	
?>
