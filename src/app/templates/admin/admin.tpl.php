<section class="page">

	<div class="page__header">
		<h1>Admin panel</h1>
	</div>
	
	<?php if( isset($_SESSION['formError']) || isset($_SESSION['formMessage'])) { ?>
		
		<div class="grid__container message-box">
			
			<?php if(isset($_SESSION['formError'])) { ?>
				
				<p class="form__message form__message--error"><?php echo $_SESSION['formError']; unset($_SESSION['formError']);?></p>

			<?php } ?>

			<?php if(isset($_SESSION['formMessage'])) { ?>
				
				<p class="form__message"><?php echo $_SESSION['formMessage']; unset($_SESSION['formMessage']);?></p>

			<?php } ?>

		</div>

	<?php } ?>
	
	<?php $app->loadModule('userlist', null); ?>

	<?php $app->loadModule('desklist', null); ?>

	<?php $app->loadModule('grouplist', null); ?>

</section>
