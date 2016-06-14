<header class="header js--navigation">
	
	<div class="header__container">
		<h1 class="header__logo">
			<a href="/">
				Damco-Seats
			</a>
		</h1>
		
		<input type="checkbox" class="header__navigation-status" id="navigation">
		<label for="navigation" class="header__navigation-toggle"></label>

		<nav class="header__navigation">

			<ul>
				<li><a href="/">Home</a></li>
				<li><a href="/?page=desks">Desks</a></li>
				<li><a href="/?page=calendar">Calendar</a></li>
				<li><a href="/?page=account">Account</a></li>
				
				<?php if(!(isset($_SESSION['user']))) { ?>
					
					<li><a href="?page=login">Login</a></li>

				<?php } else { ?>
					
					<li><a href="?page=home&logout">Logout</a></li>

				<?php } ?>

			</ul>

		</nav>

	</div>

</header>