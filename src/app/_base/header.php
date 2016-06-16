<header class="header js--header">
	
	<div class="header__container">
		
		<h1 class="header__logo">
			<a href="/">
				Damco-Seats
			</a>
		</h1>
	
		<button class="header__navigation-toggle">
			<span></span>
			<span></span>
			<span></span>
		</button>

		<nav class="header__navigation">

			<ul>		
				
				<?php if(!(isset($_SESSION['user']))) { ?>
					
					<li><a class="<?php echo ($app->navigationActive('register') ? 'is--active' : ''); ?>"  href="?page=register">Register</a></li>
					<li><a class="<?php echo ($app->navigationActive('login') ? 'is--active' : ''); ?>" href="?page=login">Login</a></li>

				<?php } else { ?>

					<li><a class="<?php echo ($app->navigationActive('home') ? 'is--active' : ''); ?>" href="/">Home</a></li>
					<li><a class="<?php echo ($app->navigationActive('desks') ? 'is--active' : ''); ?>" href="/?page=desks">Desks</a></li>
					<li><a class="<?php echo ($app->navigationActive('calendar') ? 'is--active' : ''); ?>" href="/?page=calendar">Calendar</a></li>
					<li><a class="<?php echo ($app->navigationActive('account') ? 'is--active' : ''); ?>" href="/?page=account">Account</a></li>
					<li><a href="?page=home&logout">Logout</a></li>

				<?php } ?>

			</ul>

		</nav>

	</div>

</header>