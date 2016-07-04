<div class="legend">

	<ul>
		<li>flex desk</li>
		<li>selected desk</li>
		<li>fixed desk</li>
	</ul>

</div>

<form action="<?php echo '?page=' . $_GET['page'] ?>" method="post">
	
	<?php foreach ($rooms as $room) { ?>
		
		<section class="desks__group">
		
			<h2>Room: <?php echo $room['name']; ?></h2>

			<ul>
				
				<?php $desks = getDesks($room['name'], $conn); ?>

				<?php foreach ($desks as $key => $desk) { ?>
					
					<?php if($desk['status'] === 'flex') { ?>
						
						<li>
							<input id="<?php echo $desk['ID']; ?>" name="desks[]" value="<?php echo $desk['ID']; ?>" type="checkbox">
							<label for="<?php echo $desk['ID']; ?>"></label>
						</li>

					<?php } else { ?>

						<li><a class="is--active" href="<?php echo '?page='. $page . '&detail=' . $desk['ID']; ?>"></a></li>

					<?php } ?>

				<?php } ?>

			</ul>

		</section>

	<?php }?>
	
	<?php if( !empty($desks) ) { ?>
		
		<section class="grid__container form">

			<div class="form__group">
				<h2>Select and book a desk</h2>
				<p>You can select multiple desks if you've clients over.</p>
			</div>
			
			<div class="form__group form__group--small">
				
				<?php if(isset($_SESSION['formError'])) { ?>
					
					<p class="form__message form__message--error"><?php echo $_SESSION['formError']; unset($_SESSION['formError']);?></p>

				<?php } ?>

				<?php if(isset($_SESSION['formMessage'])) { ?>
					
					<p class="form__message"><?php echo $_SESSION['formMessage']; unset($_SESSION['formMessage']);?></p>

				<?php } ?>
				
				<label for="description">Description*</label>	
				<textarea name="description" id="description" cols="30" rows="2"></textarea>

			</div>
			
			<button name="book" type="submit" class="button--highlighted">Book desk</button>
			
		</section>

	<?php } ?>

</form>