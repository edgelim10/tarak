<?php
	session_start();
	
	$username=$_SESSION['username'];
	date_default_timezone_set('Asia/Manila');
	$datewithtime=date('D, m/d/y g:i a');
	//$datewithtime=date('l, F d Y g:i a');
	$date=date('F d Y');
	$pcname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	$nav=$_GET['nav'];
	include('conn.php');
	$pcname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	//$visitor=mysql_query("INSERT INTO visitor (ip, pcname, date) VALUES 
	//('$user_ip', '$pcname', '$datewithtime')");
	if(isset($_POST['login'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
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
	$success=mysql_query("SELECT * FROM user WHERE username='$username' and password='$password'");
	$olrayt=mysql_num_rows($success);
	$meron=mysql_fetch_array($success);
	$stat="online";
	if ($olrayt == 1){
	session_start();
	$_SESSION['username']=$username;
	$pcname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
//		$data="\n $datewithtime $pcname \n";
	//$ret = file_put_contents('tmp/visitor.txt', $data, FILE_APPEND | LOCK_EX);
    //if($ret === false) {
      //  die('There was an error writing this file');
    //}
function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}
$user_ip = getUserIP();

//echo $user_ip; // Output IP address [Ex: 177.87.193.134]
	
	//$online=mysql_query("INSERT INTO online (username, password, accounttype, status, ip, pcname, timein) VALUES 
	//('$username', '$password', '$at','$stat', '$user_ip', '$pcname', '$datewithtime')");
	header("location: dsr.php");
	}
	else{
		echo "<center style='color:red;font-family:calibri;'><b>Mali ! Ctrl Shift yun!</b><br /></center>";
	}
}
?>

<!DOCTYPE html>
<head>
<title>dsr test</title>
	<link rel="icon" type="image" href="img/iface2.png">
     <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/login.css" />
    <link rel="stylesheet" href="assets/plugins/magic/magic.css" />
</head>
<body>
<?php
	if($_GET['nav'] == "loginfirst"){
		echo"<center>";
		echo"Please <a href='../search2'>login</a> to continue";
		echo"</center>";
	}
	if(!$_GET['nav'] == "loginfirst"){
?>
 <div class="container">
	<center><img src="img/iface.jpeg" style="width:30px;height:30px;"></center>
    <div class="tab-content">
        <div id="login" class="tab-pane active">
		<?php echo $error_log; ?>
		<center>
           <form action="" class="form-signin" method="post">
                <input autofocus="autofocus" name="username" type="text" placeholder="Username" class="form-control" required/>
                <input name="password" type="password" placeholder="Password" class="form-control" required/>
				<input style="" name="login" class="btn text-muted text-center btn-danger" type="submit" value="Sign In">
                <!--<input style="float:right;background:red;border:1px solid red;" name="login" class="btn text-muted text-center btn-danger" type="submit" value="Sign In">-->
            </form>
			</center>
		<br />
	<br />
			<br />
    </div>
</div>
<center>
	<?php }//echo $datewithtime; ?>
</center>
</body>
</html>