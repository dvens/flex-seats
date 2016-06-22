<?php 
	
	$user = getUser($desk['userID'], $conn);

?>

<section class="grid__container form">

	<div class="form__group">
		
		<?php if(isset($_SESSION['formError'])) { ?>
			
			<p class="form__message form__message--error"><?php echo $_SESSION['formError']; unset($_SESSION['formError']);?></p>

		<?php } ?>
		
		<h2>Details of desknumber: <?php echo $_GET['detail']; ?></h2>
		<p><strong>Booked by:</strong> <?php echo $user['emailaddress']; ?></p>
		<p><strong>Description:</strong> <?php echo $desk['description']; ?></p>

	</div>
	
	<?php if($_SESSION['userID'] === $user['ID'] ) { ?>
		
		<form action="<?php echo '?page=' . $_GET['page'] . '&detail='.$_GET['detail']; ?>" method="post">
			
			<input name="userId" type="hidden" value="<?php echo $user['ID']; ?>">
			<button name="delete" type="submit" class="button--delete">delete booking</button>	

		</form>

	<?php } ?>

</section>