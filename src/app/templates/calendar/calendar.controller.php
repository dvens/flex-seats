<?php 
	
	require('./app/core/connection.php');

	if(!(isset($_SESSION['user']))) {
		header('Location: ?page=login');
	}

?>