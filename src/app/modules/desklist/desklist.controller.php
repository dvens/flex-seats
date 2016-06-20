<?php 
	
	require('./app/core/connection.php');
	
	$desks = getDesks($conn);
	$rooms = getRooms($conn);

	if( isset($_POST['deleteDesk']) ) {

		$deskID = (isset($_POST['deskid']) ? $_POST['deskid'] : null );

		$sql = 'DELETE FROM desk WHERE ID = :deskID';
	    $stmt = $conn->prepare($sql);
	    
	    //Bind the values;
	    $stmt->bindValue(':deskID', $deskID);
	 	
	    // Fetch the query
	    $stmt->execute();

	    $_SESSION['formMessage'] = 'The desk with id '. $deskID . ' is succesfully deleted.';
		header('Location: ?page=admin');
		exit;

	}

	if( isset($_POST['addDesk']) ) {

		$sorts = (isset($_POST['sorts']) ? $_POST['sorts'] : 'flex desk' );
		$rooms = (isset($_POST['rooms']) ? $_POST['rooms'] : '' );
		$userID = 0;

		// If there is no room selected
		if( empty($rooms) ){

			$_SESSION['formError'] = 'A desk has to have a room please create or select one.';
	    	header('Location: ?page=admin');
	    	exit;

	    }
		
		$sql = 'INSERT INTO desk (status, userID, room) VALUES (:status, :userID, :room)';
	    $stmt = $conn->prepare($sql);
	    
	    //Bind the values;
	    $stmt->bindValue(':status', $sorts);
	    $stmt->bindValue(':userID', $userID);
	    $stmt->bindValue(':room', $rooms);
	 	
	    // Fetch the query
	    $result = $stmt->execute();

	    // If the server returns a value
	    if($result){

			$_SESSION['formMessage'] = 'You\'ve succesfully added a desk';
	    	header('Location: ?page=admin');
	    	exit;

	    }

	}

	// Return all the desks
	function getDesks($conn) {

		$sql = 'SELECT * FROM desk';
	    $stmt = $conn->prepare($sql);

	    //Execute query
	    $stmt->execute();
	    
	    //Fetch the query.
	    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	    return $results;

	}

	function getRooms($conn) {

		$sql = 'SELECT * FROM rooms';
	    $stmt = $conn->prepare($sql);

	    //Execute query
	    $stmt->execute();
	    
	    //Fetch the query.
	    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	    return $results;
		
	}

?>

