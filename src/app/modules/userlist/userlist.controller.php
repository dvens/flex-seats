<?php 
	
	require('./app/core/connection.php');
	
	$users = getUsers($conn);

	if( isset($_POST['delete']) ) {

		$user = $_POST['userid'];

		if($user === $_SESSION['userID']) {
			
			$_SESSION['formError'] = 'You cannot delete your own account';
			header('Location: ?page=admin');
			exit;

		}

		$sql = 'DELETE FROM users WHERE ID = :userID';
	    $stmt = $conn->prepare($sql);
	    
	    //Bind the values;
	    $stmt->bindValue(':userID', $user);
	 	
	    // Fetch the query
	    $stmt->execute();

	    $_SESSION['formMessage'] = 'The user with id '. $user . ' is succesfully deleted.';
		header('Location: ?page=admin');
		exit;

	}

	function getUsers($conn) {

		$sql = 'SELECT * FROM users';
	    $stmt = $conn->prepare($sql);

	    //Execute query
	    $stmt->execute();
	    
	    //Fetch the query.
	    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	    return $results;

	}

?>

