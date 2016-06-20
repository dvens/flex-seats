<section class="grid__container form">

	<div class="form__group">
		<h2>List of users</h2>
	</div>

	<ul class="admin-list">
		<?php foreach ($users as $user) { ?>
			
			<li>

				<form action="<?php echo '?page=' . $_GET['page'] ?>" method="post">

					<input type="hidden" name="userid" value="<?php echo $user['ID']; ?>">
					
					<div class="grid__wrapper">
						
						<div class="grid__column grid__column--half">
							<p class="admin-list__email"><?php echo $user['emailaddress']; ?></p>
						</div>

						<div class="grid__column grid__column--half">
							<button type="submit" name="deleteUser" class="button--delete">delete user</button>
						</div>

					</div>
					
				</form>
			</li>

		<?php } ?>
	</ul>

</section>