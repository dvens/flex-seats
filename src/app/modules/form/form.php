<form action="<?php echo '?page=' . $_GET['page'] ?>" method="post">
	
	<?php if($moduleType === 'register') { ?>
		
		<div class="form__group form__group--small">
			
			<label for="emailaddress">Email address*</label>	
			<input id="emailaddress" name="emailaddress" type="email">
			
			<label for="surname">Name*</label>	
			<input id="surname" name="surname" type="text">

			<label for="password">Password*</label>	
			<input id="password" name="password" type="password">

			<label for="desk">Kind of desk*</label>	
			<select name="desk" id="desk">
				<option value="flex">flex desk</option>
				<option value="fixed">fixed desk</option>
			</select>

			<label>Gender*</label>
			
			<div class="gender gender--male">
				<input name="gender" id="man" type="radio" value="male">
				<label for="man"></label>
			</div>
			
			<div class="gender gender--female">
				<input name="gender" id="woman" type="radio" value="female">
				<label for="woman"></label>
			</div>

		</div>

		<button name="register" type="submit" class="button--highlighted">register</button>	

	<?php } ?>

	<?php if($moduleType === 'login') { ?>
		
		<div class="form__group form__group--small">
			
			<label for="emailaddress">Email address</label>	
			<input id="emailaddress" name="emailaddress" type="email">
			
			<label for="password">Password</label>	
			<input id="password" name="password" type="password">

		</div>

		<button name="login" type="submit" class="button--highlighted">login</button>	

	<?php } ?>

	<?php if($moduleType === 'validation') { ?>
		
		<div class="form__group form__group--small">
			
			<label for="validation">Validation code</label>	
			<input id="validation" name="validation" type="text">

		</div>

		<button name="validate" type="submit" class="button--highlighted">validate</button>	

	<?php } ?>

</form>