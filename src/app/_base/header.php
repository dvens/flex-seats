<header class="header js--header">
	
	<div class="header__container">
		
		<?php if( (isset($_SESSION['user'])) ) { ?>
			
			<a ajax-link href="/?page=account" class="header__profile">
				<img src="./images/user.jpg" alt="user">
				<p>Dylan</p> 
			</a>

		<?php } ?>
	
		<button class="header__navigation-toggle">
			<span></span>
			<span></span>
			<span></span>
		</button>

		<!-- <a class="header__button" href="/">
			<svg width="27" height="19" viewBox="0 0 27 19" xmlns="http://www.w3.org/2000/svg"><path d="M9.223.834a.904.904 0 0 1 1.299 0 .931.931 0 0 1 0 1.297L3.938 8.78h21.726c.506 0 .922.406.922.918a.93.93 0 0 1-.922.93H3.938l6.584 6.636a.948.948 0 0 1 0 1.31.904.904 0 0 1-1.299 0l-8.142-8.22a.931.931 0 0 1 0-1.298L9.223.834z" fill="#FFF" fill-rule="evenodd"/></svg>	
		</a> -->

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