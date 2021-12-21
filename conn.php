<?php
	$conn = new PDO( 'mysql:host=localhost;dbname=db_pdo_search2', 'root', 'rootroot');
	if(!$conn){
		die("Error: Failed to coonect to database!");
	}
?>