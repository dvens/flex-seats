<?php 
	
	class Peach {

		private $page;
		private $pageTemplate;
		private $pageController;
		private $errorTemplate;
		private $moduleFolder;

		public function __construct($page, $templateFolder, $moduleFolder) {

			$this->page = $page;
			$this->moduleFolder = $moduleFolder;
			$this->pageTemplate = $templateFolder . $this->page . '/' . $this->page . '.tpl.php';
			$this->pageController = $templateFolder . $this->page . '/' . $this->page . '.controller.php';
			$this->errorTemplate = $templateFolder . '404.php';
			
		}

		public function loadView($app) {

			if(is_file($this->pageTemplate)) {
				
				include_once($this->pageController);
				include_once($this->pageTemplate);

			} else {

				$error = 'Page ' . $this->page . ' not found';
				include_once($this->errorTemplate);

			}

		}

		public function loadModule($moduleName, $moduleType) {

			$moduleName = isset($moduleName) ? $moduleName : null;
			$moduleType = isset($moduleType) ? $moduleType : null;
			
			$controller = $this->moduleFolder . $moduleName . '/' . $moduleName . '.controller.php'; 
			$module = $this->moduleFolder . $moduleName . '/' . $moduleName . '.php'; 

			if(is_file($module)) {
				
				include($controller);
				include($module);

			} else {

				$error = 'Module ' . $this->moduleFolder . ' not found';
				include_once($this->errorTemplate);

			}

		}

		public function setPageTitle() {
			return $this->page;
		}

		public function navigationActive($name) {

			if($name === $this->page) {
				return true;
			}

		}

	}

?>