<?php
	//require the database connection
	require_once 'conn.php';
 
	if(ISSET($_POST['save'])){
 		//setting up the variables
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
 
 
		try{
			//setting attribute on the database handle
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//Inserstion Query
			$sql = "INSERT INTO `member`(firstname, lastname, address)  VALUES ('$firstname', '$lastname', '$address')";
			//Execute Query
			$conn->exec($sql);
		}catch(PDOException $e){
			// Display error message
			echo $e->getMessage();
		}
 		//Closing the connection
		$conn = null;
 		//redirecting to the index page
		header("location: index.php");
 
	}
?>