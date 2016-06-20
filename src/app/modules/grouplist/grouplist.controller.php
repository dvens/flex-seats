<?php 
	
	require('./app/core/connection.php');
	
	$rooms = getRooms($conn);

	if( isset($_POST['deleteRoom']) ) {

		$roomID = (isset($_POST['roomid']) ? $_POST['roomid'] : null );

		$sql = 'DELETE FROM rooms WHERE ID = :roomID';
	    $stmt = $conn->prepare($sql);
	    
	    //Bind the values;
	    $stmt->bindValue(':roomID', $roomID);
	 	
	    // Fetch the query
	    $stmt->execute();

	    $_SESSION['formMessage'] = 'The desk with id '. $roomID . ' is succesfully deleted.';
		header('Location: ?page=admin');
		exit;

	}

	if( isset($_POST['addRoom']) ) {

		// $sorts = (isset($_POST['sorts']) ? $_POST['sorts'] : 'flex desk' );
		// $rooms = (isset($_POST['rooms']) ? $_POST['rooms'] : '' );
		// $userID = 0;

		// // If there is no room selected
		// if( empty($rooms) ){

		// 	$_SESSION['formError'] = 'A desk has to have a room please create or select one.';
	 //    	header('Location: ?page=admin');
	 //    	exit;

	 //    }
		
		// $sql = 'INSERT INTO desk (status, userID, room) VALUES (:status, :userID, :room)';
	 //    $stmt = $conn->prepare($sql);
	    
	 //    //Bind the values;
	 //    $stmt->bindValue(':status', $sorts);
	 //    $stmt->bindValue(':userID', $userID);
	 //    $stmt->bindValue(':room', $rooms);
	 	
	 //    // Fetch the query
	 //    $result = $stmt->execute();

	 //    // If the server returns a value
	 //    if($result){

		// 	$_SESSION['formMessage'] = 'You\'ve succesfully added a desk';
	 //    	header('Location: ?page=admin');
	 //    	exit;

	 //    }

	}

	// Return all rooms
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

