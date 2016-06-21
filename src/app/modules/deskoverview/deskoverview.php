<section class="desks">
	
	<?php if( isset($_GET['detail']) ) { ?>
		
		<?php include('detail-page.php'); ?>

	<?php } else { ?>

		<?php include('overview.php'); ?>

	<?php } ?>

</section>