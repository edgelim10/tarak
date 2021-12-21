<?php
$prod_id=$_GET['productid'];
$storecode=$_GET['storecode'];
$date=$_GET['date'];
echo $prod_id;
echo $storecode;
echo $date;
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
$query =mysql_query("SELECT * FROM `table 2` WHERE id='$prod_id'");
$petch=mysql_fetch_array($query);

$pi=$petch['id'];
$br=$petch['brand'];
$in=$petch['item name'];
$ic=$petch['item code'];
$bc=$petch['barcode'];
$sku=$petch['sku'];
$up=$petch['unit price'];
echo "<br />";
echo $in;

//$addtocart=mysql_query("INSERT INTO cart (productid, store_code, date, brand, item_name, item_code, barcode, sku, unit_price)VALUES('$pi', '$storecode', '$date', '$br', '$in', '$ic', '$bc', '$sku', '$up')");
//$adding=mysql_query("INSERT INTO cart (item_name)VALUES('$in')");
	$adding=mysql_query("INSERT INTO cart (productid, store_code, date, brand, item_name, item_code, barcode, sku, unit_price)VALUES
('$prod_id','$storecode','$date','$br','$in','$ic','$bc','$sku','$up')");
	//if(!$adding){
	//	die("ayaw talaga ma-add eh");
	//}
	//else{
	header("location: dsr.php?storecode=$storecode&date=$date");
	//}
?>