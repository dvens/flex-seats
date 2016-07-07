<section class="grid__container form">

	<div class="form__group">
		<h2>List of desks</h2>
	</div>

	<ul class="admin-list">
		<?php foreach ($desks as $desk) { ?>
			
			<li>

				<form action="<?php echo '?page=' . $_GET['page'] ?>" method="post">

					<input type="hidden" name="deskid" value="<?php echo $desk['ID']; ?>">
					
					<div class="grid__wrapper">
						
						<div class="grid__column grid__column--half">
							<p class="admin-list__email"><?php echo 'Desk number: ' . $desk['ID'] . ' - ' . $desk['status']; ?></p>
						</div>

						<div class="grid__column grid__column--half">
							<button type="submit" name="deleteDesk" class="button--delete">delete desk</button>
						</div>

					</div>
					
				</form>
			</li>

		<?php } ?>
	</ul>

</section>

<section class="grid__container form">

	<div class="form__group">
		<h2>Add desk</h2>
		<p>To add a desk choose a room to place the desk and select the kind of desk.</p>
	</div>
	
	<form action="<?php echo '?page=' . $_GET['page'];?>" method="post">
		
		<div class="form__group form__group--small">
				
				<label for="rooms">Rooms*</label>	
				
				<?php if( empty($rooms) ) { ?>
					
					<p class="select-message">List of rooms is empty, create a room first!</p>

				<?php } else { ?>

					<select name="rooms" id="rooms">
						
						<?php foreach ($rooms as $room) { ?>
							
							<option value="<?php echo $room['name'] ?>">
								<?php echo $room['name'] ?>
							</option>

						<?php } ?>

					</select>

				<?php } ?>	

				<label for="sorts">Kind of desk*</label>
				<select name="sorts" id="sorts">
					<option value="flex">flex desk</option>
					<option value="fixed">fixed desk</option>
				</select>

		</div>
	
		<button name="addDesk" type="submit" class="button--highlighted">Add desk</button>	

	</form>

</section>