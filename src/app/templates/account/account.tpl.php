<section class="page">

	<div class="page__header">
		<h1>My account</h1>
	</div>

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

				<label for="desk">Kind of desk*</label>	
				<select name="desk" id="desk">

					<?php if($userData['deskType'] === 'flex') { ?>
						
						<option selected value="flex">flex desk</option>
						<option value="fixed">fixed desk</option>

					<?php } else { ?>
						
						<option selected value="fixed">fixed desk</option>
						<option value="flex">flex desk</option>

					<?php } ?>
				</select>

			</div>

			<button name="save" type="submit" class="button--highlighted">save</button>	

		</form>

	</section>
	
</section>
