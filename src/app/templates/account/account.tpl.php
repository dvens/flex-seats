<section class="page">

	<header class="page__header">
		<h2>Account</h2>
	</header>

	<section class="grid__container form">

		<div class="form__group">
			<h2>User settings</h2>
			<p>Edit your settings and save them.</p>
		</div>
		
		<form action="<?php echo '?page=' . $_GET['page'] ?>" method="post">

			<div class="form__group form__group--small">

				<?php if(isset($GLOBALS['formError'])) { ?>
					
					<p class="form__message form__message--error"><?php echo $GLOBALS['formError']; ?></p>

				<?php } ?>

				<?php if(isset($GLOBALS['formMessage'])) { ?>
					
					<p class="form__message"><?php echo $GLOBALS['formMessage']; ?></p>

				<?php } ?>
				
				<label for="emailaddress">Email address</label>	
				<input id="emailaddress" name="emailaddress" type="email" value="<?php echo $userData['emailaddress'] ?>">
				
				<label for="surname">Name</label>	
				<input id="surname" name="surname" type="text" value="<?php echo $userData['surname'] ?>">

				<label for="password">Password</label>	
				<input id="password" name="password" type="password" value="<?php echo $userData['password'] ?>">

			</div>

			<button name="save" type="submit" class="button--highlighted">save</button>	

		</form>

	</section>
	
</section>
