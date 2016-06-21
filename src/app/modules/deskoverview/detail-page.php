<section class="grid__container form">

	<div class="form__group">
		<?php $user = getUser($desk['userID'], $conn); ?>
		<h2>Details of desknumber: <?php echo $_GET['detail']; ?></h2>
		<p>Booked by: <?php echo $user['emailaddress']; ?></p>
		<p>Description: <?php echo $desk['description']; ?></p>
	</div>

</section>