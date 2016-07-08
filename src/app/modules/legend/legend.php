<?php if(isset($_SESSION['userID'])) { ?>
	
	<section class="legend">
		
		<h2>Information</h2>
		<h3>Calendar</h3>

		<ul>
			<?php foreach ($legendItems as $item) { ?>
				
				<li><?php echo $item; ?>

			<?php }?>
		</ul>

	</section>

	<button class="legend__button"></button>

<?php } ?>