<?php 

	function loadView() {
		
		$page = isset($_GET['page']) ? $_GET['page'] : 'home';
		$template = "app/templates/". $page . ".tpl.php";
		$template_error = "app/templates/404.php";

		if(is_file($template)) {
			
			return include_once($template);

		} else {

			$error = "Page not found";
			return include_once($template_error);

		}

	}

	function loadModule($moduleName, $moduleType) {
		
		$moduleName = isset($moduleName) ? $moduleName : null;
		$moduleType = isset($moduleType) ? $moduleType : null;
		$file = "app/modules/". $moduleName . ".php"; 


		if(is_file($file)) {
			
			return include($file);

		} else {

			$error = "Module not found";
			return include_once($template_error);

		}

	}

?>