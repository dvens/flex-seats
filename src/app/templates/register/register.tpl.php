<section class="page">

	<header class="page__header">
		
		<a class="page__button-back" href="?page=login">
			<svg width="27" height="19" viewBox="0 0 27 19" xmlns="http://www.w3.org/2000/svg"><path d="M9.223.834a.904.904 0 0 1 1.299 0 .931.931 0 0 1 0 1.297L3.938 8.78h21.726c.506 0 .922.406.922.918a.93.93 0 0 1-.922.93H3.938l6.584 6.636a.948.948 0 0 1 0 1.31.904.904 0 0 1-1.299 0l-8.142-8.22a.931.931 0 0 1 0-1.298L9.223.834z" fill="#FFF" fill-rule="evenodd"/></svg>	
		</a>

		<h2>Register</h2>

	</header>
	
	<section class="login">
		
		<div class="grid__container form">
			
			<div class="form__group">
				<h2>login on damco seats</h2>
				<p>Before logging in <a class="link" href="?page=register">register an account.</a></p>
			</div>
			
			<?php loadModule('form', 'register'); ?>

		</div>

	</section>
	
	
</section>
