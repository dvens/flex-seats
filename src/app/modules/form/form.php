<form action="<?php echo '?page=' . $_GET['page'] ?>" method="post">
	
	<?php if($moduleType === 'register') { ?>
		
		<div class="form__group form__group--small">
			
			<label for="emailaddress">Email address</label>	
			<input id="emailaddress" name="email" type="email">
			
			<label for="surname">Surname</label>	
			<input id="surname" name="surname" type="text">

			<label for="password">Password</label>	
			<input id="password" name="password" type="password">

		</div>

		<button type="submit" class="button--highlighted">login</button>	

	<?php } ?>

	<?php if($moduleType === 'login') { ?>
		
		<div class="form__group form__group--small">
			
			<label for="emailaddress">Email address</label>	
			<input id="emailaddress" name="email" type="email">
			
			<label for="password">Password</label>	
			<input id="password" name="password" type="password">

		</div>

		<button type="submit" class="button--highlighted">login</button>	

	<?php } ?>

	<?php if($moduleType === 'validation') { ?>
		
		<div class="form__group form__group--small">
			
			<label for="validation">Validation code</label>	
			<input id="validation" name="validation" type="text">

		</div>

		<button type="submit" class="button--highlighted">validate</button>	

	<?php } ?>

</form>