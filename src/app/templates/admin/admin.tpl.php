<section class="page">

	<header class="page__header">
		
		<a class="page__button-back" href="/">
			<svg width="27" height="19" viewBox="0 0 27 19" xmlns="http://www.w3.org/2000/svg"><path d="M9.223.834a.904.904 0 0 1 1.299 0 .931.931 0 0 1 0 1.297L3.938 8.78h21.726c.506 0 .922.406.922.918a.93.93 0 0 1-.922.93H3.938l6.584 6.636a.948.948 0 0 1 0 1.31.904.904 0 0 1-1.299 0l-8.142-8.22a.931.931 0 0 1 0-1.298L9.223.834z" fill="#FFF" fill-rule="evenodd"/></svg>	
		</a>

		<h2>Admin panel</h2>
		
	</header>
	
	<div class="grid__container message-box">
		
		<?php if(isset($_SESSION['formError'])) { ?>
			
			<p class="form__message form__message--error"><?php echo $_SESSION['formError']; unset($_SESSION['formError']);?></p>

		<?php } ?>

		<?php if(isset($_SESSION['formMessage'])) { ?>
			
			<p class="form__message"><?php echo $_SESSION['formMessage']; unset($_SESSION['formMessage']);?></p>

		<?php } ?>

	</div>
	
	<?php $app->loadModule('userlist', null); ?>

	<?php $app->loadModule('desklist', null); ?>

	<?php $app->loadModule('grouplist', null); ?>

</section>
