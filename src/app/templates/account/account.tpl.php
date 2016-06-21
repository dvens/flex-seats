<section class="page">

	<header class="page__header">
		
		<a class="page__button-back" href="/">
			<svg width="27" height="19" viewBox="0 0 27 19" xmlns="http://www.w3.org/2000/svg"><path d="M9.223.834a.904.904 0 0 1 1.299 0 .931.931 0 0 1 0 1.297L3.938 8.78h21.726c.506 0 .922.406.922.918a.93.93 0 0 1-.922.93H3.938l6.584 6.636a.948.948 0 0 1 0 1.31.904.904 0 0 1-1.299 0l-8.142-8.22a.931.931 0 0 1 0-1.298L9.223.834z" fill="#FFF" fill-rule="evenodd"/></svg>	
		</a>

		<h2>Account</h2>
		
	</header>

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
