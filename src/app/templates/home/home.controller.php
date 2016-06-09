<?php 

	if(!(isset($_SESSION['user']))) {
		header('Location: ?page=login');
	}

	if((isset($_GET['logout']))) {

		session_destroy();
		header('Location: ?page=login');

	}

?>