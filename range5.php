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
		$query=mysql_query("SELECT productid, store_code, date, brand, item_name, item_code, barcode, sku, SUM(qty), unit_price FROM cart WHERE date(date) BETWEEN '$date1' AND '$date2' group by store_code, productid order by brand ASC") or die(mysqli_error());
		$row=mysql_num_rows($query);
		if($row>0){
			while($fetch=mysql_fetch_array($query)){
				$sumx +=$fetch['SUM(qty)'];
?>
	<tr>
		<td><?php echo $fetch['productid']?></td>
		<td><?php echo $fetch['store_code']?></td>
		<td><?php echo $fetch['brand']?></td>
		<td><?php echo $fetch['item_name']?></td>
		<td><?php echo $fetch['item_code']?></td>
		<td><?php echo $fetch['barcode']?></td>
		<td><?php echo $fetch['sku']?></td>
		<td><?php echo $fetch['SUM(qty)']?></td>
		<td><?php echo $fetch['unit_price']?></td>
		<td><?php $amount= $fetch['unit_price'] * $fetch['SUM(qty)']; echo $amount;echo".00";$sam += $amount;?></td>
		
	</tr>
<?php
			}
			echo"
			<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		
		
		<td><b>Total:</b>
		</td>
		<td><b>";
		echo $sumx;
		
		echo"</b></td>
		<td></td>
		<td><b>$sam.00</b></td>
		
		</tr><a href='export5.php?date1=$date1&date2=$date2'>export</a>";
			
		}else{
			echo'
			<tr>
				<td colspan = "4"><center>Record Not Found</center></td>
			</tr>';
		}
	}
	
?>
