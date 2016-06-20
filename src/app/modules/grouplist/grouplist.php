<section class="grid__container form">

	<div class="form__group">
		<h2>List of rooms</h2>
	</div>

	<ul class="admin-list">
		<?php foreach ($rooms as $room) { ?>
			
			<li>

				<form action="<?php echo '?page=' . $_GET['page'] ?>" method="post">

					<input type="hidden" name="roomid" value="<?php echo $room['ID']; ?>">
					
					<div class="grid__wrapper">
						
						<div class="grid__column grid__column--half">
							<p class="admin-list__email"><?php echo 'Room name: ' . $room['ID'] . ' - ' . $room['name']; ?></p>
						</div>

						<div class="grid__column grid__column--half">
							<button type="submit" name="deleteRoom" class="button--delete">delete room</button>
						</div>

					</div>
					
				</form>
			</li>

		<?php } ?>
	</ul>

</section>

<section class="grid__container form">

	<div class="form__group">
		<h2>Add room</h2>
	</div>
	
	<form action="<?php echo '?page=' . $_GET['page'] ?>" method="post">
		
		<div class="form__group form__group--small">

			<label for="room">Room name*</label>	
			<input id="room" name="roomname" type="text">

		</div>
	
		<button name="addRoom" type="submit" class="button--highlighted">Add room</button>	

	</form>

</section>