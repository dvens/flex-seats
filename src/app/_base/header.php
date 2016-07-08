<header class="header js--header">
	
	<div class="header__container">
		
		<?php if( (isset($_SESSION['user'])) ) { ?>
			
			<a href="?page=account" class="header__profile">
				
				<?php if($_SESSION['gender'] === 'male') { ?>
					
					<img src="./images/man.svg" alt="user">

				<?php } else { ?>

					<img src="./images/women.svg" alt="user">

				<?php } ?>
				<p><?php echo $_SESSION['user']; ?></p> 
			</a>

		<?php } ?>
	
		<button class="header__navigation-toggle">
			<span></span>
			<span></span>
			<span></span>
		</button>

		<nav class="header__navigation js--navigation">

			<ul>		
				
				<?php if(!(isset($_SESSION['user']))) { ?>
					
					<li><a ajax-link class="<?php echo ($app->navigationActive('register') ? 'is--active' : ''); ?>"  href="?page=register">Register</a></li>
					<li><a ajax-link class="<?php echo ($app->navigationActive('login') ? 'is--active' : ''); ?>" href="?page=login">Login</a></li>

				<?php } else { ?>

					<li><a ajax-link class="<?php echo ($app->navigationActive('home') ? 'is--active' : ''); ?>" href="/">Home</a></li>
					
					<?php if( $_SESSION['userRole'] === 'admin' ) { ?>
					
						<li><a ajax-link class="<?php echo ($app->navigationActive('admin') ? 'is--active' : ''); ?>" href="/?page=admin">Admin panel</a></li>
					
					<?php } ?>

					<li><a ajax-link class="<?php echo ($app->navigationActive('account') ? 'is--active' : ''); ?>" href="/?page=account">My Account</a></li>
					<li><a href="?page=home&logout">Logout</a></li>

				<?php } ?>

			</ul>

		</nav>

	</div>

</header>