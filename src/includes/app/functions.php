<?php 

	function loadView() {
		
		$page = isset($_GET['page']) ? $_GET['page'] : 'home';
		$template = include("includes/templates/". $page . ".tpl.php");

	}

?>