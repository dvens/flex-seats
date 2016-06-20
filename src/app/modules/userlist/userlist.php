<section class="grid__container form">

	<div class="form__group">
		<h2>List of users</h2>

		<?php if(isset($_SESSION['formError'])) { ?>
			
			<p class="form__message form__message--error"><?php echo $_SESSION['formError']; unset($_SESSION['formError']);?></p>

		<?php } ?>

		<?php if(isset($_SESSION['formMessage'])) { ?>
			
			<p class="form__message"><?php echo $_SESSION['formMessage']; unset($_SESSION['formMessage']);?></p>

		<?php } ?>

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
							<button type="submit" name="delete" class="button--delete">delete</button>
						</div>

					</div>
					
				</form>
			</li>

		<?php } ?>
	</ul>

</section>