<?php 

	require('./app/core/connection.php');

	$rooms = getRooms($conn);
	$page = isset($_GET['page']) ? $_GET['page'] : 'home';

	if( isset($_POST['book']) ) {

		$desks = (isset($_POST['desks']) ? $_POST['desks'] : '');
		$description = (isset($_POST['description']) ? $_POST['description'] : '');
		$deskType = 'fixed';


		if( empty($description) ) {

			$_SESSION['formError'] = 'Please add a description to your booking.';
			return;

		}

		$sql = 'UPDATE desk SET description = :description, status = :status, userID = :userID WHERE ID = :id';
		$stmt = $conn->prepare($sql);

		//Bind the values;
	    foreach ($desks as $desk) {
	    	
	    	$stmt->bindValue(':description', $description);
	    	$stmt->bindValue(':userID', $_SESSION['userID']);
	    	$stmt->bindValue(':status', $deskType);
	    	$stmt->bindValue(':id', $desk);

	    	$stmt->execute();

	    }

	    $_SESSION['formMessage'] = 'You\'ve booked a desk for more information click the desk.';
		header('Location: ?page=desks');
		exit;


	}

	if( isset($_GET['detail']) ) {

		$id = (isset($_GET['detail']) ? $_GET['detail'] : '');
		$desk = getDesk($id, $conn);

		if(empty($id) || $desk['userID'] === '0' || empty($desk)) {
			header('Location: ?page=404');
		}

	}

	if( isset($_POST['delete']) ) {

		$id = (isset($_POST['userId']) ? $_POST['userId'] : '');
		$deskID = (isset($_GET['detail']) ? $_GET['detail'] : '');
		$status = 'flex';
		$description = '';
		$userID = 0;
		
		if( $id !== $_SESSION['userID']) {

			$_SESSION['formError'] = 'You cannot delete this booking you\'re not the owner.';
			return;

		}

		$sql = 'UPDATE desk SET description = :description, status = :status, userID = :userID WHERE ID = :id';
		$stmt = $conn->prepare($sql);

		//Bind the values;
    	$stmt->bindValue(':description', $description);
    	$stmt->bindValue(':userID', $userID);
    	$stmt->bindValue(':status', $status);
    	$stmt->bindValue(':id', $deskID);

    	$stmt->execute();

	}

	function getDesk($id, $conn) {

		$sql = 'SELECT * FROM desk WHERE ID = :ID';
	    $stmt = $conn->prepare($sql);

	    // Bind value
	    $stmt->bindValue(':ID', $id);

	    //Execute query
	    $stmt->execute();
	    
	    //Fetch the query.
	    $result = $stmt->fetch(PDO::FETCH_ASSOC);

	    return $result;

	}

	// Return all the desks of a specific room
	function getDesks($roomName, $conn) {

		$roomName = (isset($roomName) ? $roomName : '');

		$sql = 'SELECT * FROM desk WHERE room = :roomName';
	    $stmt = $conn->prepare($sql);

	    // Bind value
	    $stmt->bindValue(':roomName', $roomName);

	    //Execute query
	    $stmt->execute();
	    
	    //Fetch the query.
	    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	    return $results;

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