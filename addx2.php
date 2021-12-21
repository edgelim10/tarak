<?php
$scc = $_GET['storecode'];
$ddd = $_GET['date'];
if($scc =="" or $ddd == ""){
	echo"input store code and date!";
}
else{
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
	$maystoreba=mysql_query("SELECT * FROM `table 9` WHERE `store_code`='$scc'");
	$meronnga=mysql_num_rows($maystoreba);
	if($meronnga <= 0){
		echo"Store code not found!";
	}
	else{
$brand1 = $_GET['brand'];
$item1 = $_GET['item'];
$price1 = $_GET['price'];
$prod_id=$_POST['itemid'];
$storecode=$_POST['stcode'];
$qqty=$_POST['qty'];
$date=$_POST['date'];
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
if(ISSET($_POST['add'])){
	$meronnaba =mysql_query("SELECT * FROM `cart` WHERE productid='$prod_id' and store_code='$storecode' and date='$date'");
$meronna=mysql_num_rows($meronnaba);
$petch2=mysql_fetch_array($meronnaba);
$oldqty= $petch2['qty'];
$qqty = $_POST['qty'];
if($meronna >=1){
	$newqty = $oldqty + $qqty;
	$upd=mysql_query("UPDATE cart SET qty='$newqty' WHERE productid='$prod_id' and store_code='$storecode' and date='$date'");
	header("location: dsr.php?storecode=$storecode&date=$date&brand=$brand1&item=$item1&price=$price1");
}
else{
	
				$qqty = $_POST['qty'];
$query =mysql_query("SELECT * FROM `table 2` WHERE id='$prod_id'");
$petch=mysql_fetch_array($query);

$pi=$petch['id'];
$br=$petch['brand'];
$in=$petch['item name'];
$ic=$petch['item code'];
$bc=$petch['barcode'];
$sku=$petch['sku'];
$up=$petch['unit price'];
//echo "<br />";
//echo $in;

//$addtocart=mysql_query("INSERT INTO cart (productid, store_code, date, brand, item_name, item_code, barcode, sku, unit_price)VALUES('$pi', '$storecode', '$date', '$br', '$in', '$ic', '$bc', '$sku', '$up')");
//$adding=mysql_query("INSERT INTO cart (item_name)VALUES('$in')");
	$adding=mysql_query("INSERT INTO cart (productid, store_code, date, brand, item_name, item_code, barcode, sku, qty, unit_price)VALUES
('$prod_id','$storecode','$date','$br','$in','$ic','$bc','$sku','$qqty','$up')");
	//if(!$adding){
	//	die("ayaw talaga ma-add eh");
	//}
	//else{
	header("location: dsr.php?storecode=$storecode&date=$date&brand=$brand1&item=$item1&price=$price1");
	//}
}
}
}
}
?>