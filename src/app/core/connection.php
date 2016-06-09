<?php 

	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$database = 'damco';
	 
	//Connect to MySQL and instantiate our PDO object.
	$conn = new PDO("mysql:host=$host;dbname=$database", $user, $pass);

?>