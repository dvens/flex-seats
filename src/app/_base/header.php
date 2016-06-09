<header class="header">
	
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
				<li><a href="/desks">Desks</a></li>
				<li><a href="/calendar">Calendar</a></li>
				<li><a href="/account">Account</a></li>
				<?php if(!(isset($_SESSION['user']))) { ?>
					<li><a href="?page=login">Login</a></li>
				<?php } else { ?>
					<li><a href="?page=home&logout">Logout</a></li>
				<?php } ?>
			</ul>

		</nav>

	</div>

</header>