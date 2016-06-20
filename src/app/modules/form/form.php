<form action="<?php echo '?page=' . $_GET['page'] ?>" method="post">
	
	<?php if($moduleType === 'register') { ?>
		
		<div class="form__group form__group--small">

			<?php if(isset($_SESSION['formError'])) { ?>
				
				<p class="form__message form__message--error"><?php echo $_SESSION['formError']; unset($_SESSION['formError']); ?></p>

			<?php } ?>

			<?php if(isset($_SESSION['formMessage'])) { ?>
				
				<p class="form__message"><?php echo $_SESSION['formMessage']; unset($_SESSION['formMessage']);?></p>

			<?php } ?>
			
			<label for="emailaddress">Email address*</label>	
			<input id="emailaddress" name="emailaddress" type="email">
			
			<label for="surname">Name*</label>	
			<input id="surname" name="surname" type="text">

			<label for="password">Password*</label>	
			<input id="password" name="password" type="password">

		</div>

		<button name="register" type="submit" class="button--highlighted">register</button>	

	<?php } ?>

	<?php if($moduleType === 'login') { ?>
		
		<div class="form__group form__group--small">

			<?php if(isset($_SESSION['formError'])) { ?>
				
				<p class="form__message form__message--error"><?php echo $_SESSION['formError']; unset($_SESSION['formError']); ?></p>

			<?php } ?>

			<?php if(isset($_SESSION['formMessage'])) { ?>
				
				<p class="form__message"><?php echo $_SESSION['formMessage']; unset($_SESSION['formMessage']); ?></p>

			<?php } ?>
			
			<label for="emailaddress">Email address</label>	
			<input id="emailaddress" name="emailaddress" type="email">
			
			<label for="password">Password</label>	
			<input id="password" name="password" type="password">

		</div>

		<button name="login" type="submit" class="button--highlighted">login</button>	

	<?php } ?>

	<?php if($moduleType === 'validation') { ?>
		
		<div class="form__group form__group--small">

			<?php if(isset($_SESSION['formError'])) { ?>
				
				<p class="form__message form__message--error"><?php echo $_SESSION['formError']; unset($_SESSION['formError']);?></p>

			<?php } ?>

			<?php if(isset($_SESSION['formMessage'])) { ?>
				
				<p class="form__message"><?php echo $_SESSION['formMessage']; unset($_SESSION['formMessage']);?></p>

			<?php } ?>
			
			<label for="validation">Validation code</label>	
			<input id="validation" name="validation" type="text">

		</div>

		<button name="validate" type="submit" class="button--highlighted">validate</button>	

	<?php } ?>

</form>