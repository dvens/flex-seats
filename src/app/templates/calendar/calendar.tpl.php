<section class="page">

	<div class="page__header page__header--pushed">
		<a href="/?page=home" class="<?php echo ($app->navigationActive('home') ? 'is--active' : ''); ?>">list</a>
		<a href="/?page=calendar" class="<?php echo ($app->navigationActive('calendar') ? 'is--active' : ''); ?>">calendar</a>
	</div>

	<?php $app->loadModule('calendar', 'full'); ?>
	
</section>
