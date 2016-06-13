<?php 

	if(!(isset($_SESSION['user']))) {
		header('Location: ?page=login');
	}

	if((isset($_GET['logout']))) {

		session_destroy();
		header('Location: ?page=login');

	}

	// Page specific things.
	// Get amount of desks here and amount of people 
	// Handle form

?>