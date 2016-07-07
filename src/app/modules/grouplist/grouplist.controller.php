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

	    $_SESSION['formMessage'] = 'The room with id '. $roomID . ' is succesfully deleted.';
		header('Location: ?page=admin');
		exit();
	}

	if( isset($_POST['addRoom']) ) {

		$roomName = (isset($_POST['roomname']) ? $_POST['roomname'] : '');

		// If there is no room selected
		if( empty($roomName) ){

			$_SESSION['formError'] = 'A room has to have a name.';
	    	header('Location: ?page=admin');
	    	exit();

	    }
		
		$sql = 'INSERT INTO rooms (name) VALUES (:roomname)';
	    $stmt = $conn->prepare($sql);
	    
	    //Bind the values;
	    $stmt->bindValue(':roomname', $roomName);
	 	
	    // Fetch the query
	    $result = $stmt->execute();

	    // If the server returns a value
	    if($result){
			$_SESSION['formMessage'] = 'You\'ve succesfully added ' . $roomName;;
	    	header('Location: ?page=admin');
	    	exit();
	    }

	}

?>

