<?php 

	function loadView() {
		
		$page = isset($_GET['page']) ? $_GET['page'] : 'home';
		$template = 'app/templates/'. $page . '.tpl.php';
		$errorTemplate = 'app/templates/404.php';

		if(is_file($template)) {
			
			include_once($template);

		} else {

			$error = 'Page ' . $page . ' not found';
			include_once($errorTemplate);

		}

	}

	function loadModule($moduleName, $moduleType) {
		
		$moduleName = isset($moduleName) ? $moduleName : null;
		$moduleType = isset($moduleType) ? $moduleType : null;
		$errorTemplate = 'app/templates/404.php';
		
		$controller = 'app/modules/'. $moduleName . '/' . $moduleName . '.controller.php'; 
		$file = 'app/modules/'. $moduleName . '/' . $moduleName . '.php'; 

		if(is_file($file)) {
			
			include($controller);
			include($file);

		} else {

			$error = 'Module ' . $moduleName . ' not found';
			include_once($errorTemplate);

		}

	}

?>