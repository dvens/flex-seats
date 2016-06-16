<?php 
	
	require_once('./config.php');
	require_once('./app/core/peach.framework.php');

	session_start();
	
	$app = new Peach(
		// Pages url
		$config['page'], 

		// Template folder path
		$config['templateFolder'], 

		// Module folder url
		$config['moduleFolder']

	);

	include('app/_base/head.php');

?>

<?php include('app/_base/header.php'); ?>
	
	<div class="loader"></div>

	<main ajax-container>
		<?php $app->loadView($app); ?>
	</main> <!-- end main -->

<?php include('app/_base/footer.php'); ?>