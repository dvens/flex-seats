<?php 

	if( !(isset($_SESSION['user'])) || $_SESSION['userRole'] !== 'admin' ) {
		
		header('Location: ?page=home');

	}

?>