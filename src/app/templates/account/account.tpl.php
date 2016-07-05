<section class="page">

	<section class="grid__container form">

		<div class="form__group">
			<h2>User settings</h2>
			<p>Edit your settings and save them.</p>
		</div>
		
		<form action="<?php echo '?page=' . $_GET['page'] ?>" method="post">

			<div class="form__group form__group--small">

				<?php if(isset($_SESSION['formError'])) { ?>
					
					<p class="form__message form__message--error"><?php echo $_SESSION['formError']; unset($_SESSION['formError']);?></p>

				<?php } ?>

				<?php if(isset($_SESSION['formMessage'])) { ?>
					
					<p class="form__message"><?php echo $_SESSION['formMessage']; unset($_SESSION['formMessage']);?></p>

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
