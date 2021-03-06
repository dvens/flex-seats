<?php 
	
	require('./app/core/connection.php');
	
	$users = getUsers($conn);

	if( isset($_POST['deleteUser']) ) {

		$userID = (isset($_POST['userid']) ? $_POST['userid'] : null );

		if($userID === $_SESSION['userID']) {
			
			$_SESSION['formWarning'] = 'You cannot delete your own account';
			header('Location: ?page=admin');
			exit;

		}

		$sql = 'DELETE FROM users WHERE ID = :userID';
	    $stmt = $conn->prepare($sql);
	    
	    //Bind the values;
	    $stmt->bindValue(':userID', $userID);
	 	
	    // Fetch the query
	    $stmt->execute();

	    $sql = 'DELETE FROM calendar WHERE userID = :userID';
	    $stmt = $conn->prepare($sql);
	    
	    //Bind the values;
	    $stmt->bindValue(':userID', $userID);
	 	
	    // Fetch the query
	    $stmt->execute();

	    $_SESSION['formMessage'] = 'The user with id '. $userID . ' is succesfully deleted.';
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

