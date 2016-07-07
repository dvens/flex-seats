<?php 
	
	require('./app/core/connection.php');

	if(!(isset($_SESSION['user']))) {
		header('Location: ?page=login');
	}

	$dates = isset($_POST['dates']) ? $_POST['dates'] : null;
	$status = isset($_POST['status']) ? $_POST['status'] : null;

	// If the selected status is away
	if( $status === 'away' ) {

		$oldAwayDates = array();
		$newAwayDates = array();
		$resultAwayDates = array();
		$statusMessage = 'away';

		$sql = 'SELECT calendarDate FROM calendar WHERE userID = :userID';
	    $stmt = $conn->prepare($sql);
	    
	    //Bind the value
	    $stmt->bindValue(':userID', $_SESSION['userID']);
	    
	    //Execute query
	    $stmt->execute();
	    
	    //Fetch the query.
	    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	    foreach ($results as $result) {
	    	
	    	$resultAwayDates[] = $result['calendarDate'];

	    }

	    for ($date=0; $date < count($dates); $date++) { 

    		if( in_array('20'. $dates[$date], $resultAwayDates) ) {

    			$oldAwayDates[] = $dates[$date];

    		} else {

    			$newAwayDates[] = $dates[$date];

    		}

	    }
	    
		// Update old values first
		$sql = 'UPDATE calendar SET status = :status WHERE userID = :userID AND calendarDate = :calendarDate';
		$stmt = $conn->prepare($sql);

		//Bind the values;
	    foreach ($oldAwayDates as $date) {
	    	
	    	$stmt->bindValue(':status', $statusMessage);
	    	$stmt->bindValue(':userID', $_SESSION['userID']);
	    	$stmt->bindValue(':calendarDate', $date);

	    	$stmt->execute();

	    }

		// Insert new values
		$sql = 'INSERT INTO calendar (userID, calendarDate, status) VALUES (:userID, :calendarDate, :status)';
		$stmt = $conn->prepare($sql);
		    
	    //Bind the values;
	    foreach ($newAwayDates as $date) {

	    	$stmt->bindValue(':userID', $_SESSION['userID']);
	    	$stmt->bindValue(':calendarDate', $date);
	    	$stmt->bindValue(':status', $statusMessage);

	    	$stmt->execute();

	    }

	 	header('Location: ?page=calendar');

	}

	// If selected status is out of office
	if( $status === 'office'  ) {

		$oldDates = array();
		$newDates = array();
		$resultDates = array();
		$statusMessage = 'office';

		$sql = 'SELECT calendarDate FROM calendar WHERE userID = :userID';
	    $stmt = $conn->prepare($sql);
	    
	    //Bind the value
	    $stmt->bindValue(':userID', $_SESSION['userID']);
	    
	    //Execute query
	    $stmt->execute();
	    
	    //Fetch the query.
	    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	    foreach ($results as $result) {
	    	
	    	$resultDates[] = $result['calendarDate'];

	    }

	    for ($date=0; $date < count($dates); $date++) { 

    		if( in_array('20'. $dates[$date], $resultDates) ) {

    			$oldDates[] = $dates[$date];

    		} else {

    			$newDates[] = $dates[$date];

    		}

	    }
	    
		// Update old values first
		$sql = 'UPDATE calendar SET status = :status WHERE userID = :userID AND calendarDate = :calendarDate';
		$stmt = $conn->prepare($sql);

		//Bind the values;
	    foreach ($oldDates as $date) {
	    	
	    	$stmt->bindValue(':status', $statusMessage);
	    	$stmt->bindValue(':userID', $_SESSION['userID']);
	    	$stmt->bindValue(':calendarDate', $date);

	    	$stmt->execute();

	    }

		// Insert new values
		$sql = 'INSERT INTO calendar (userID, calendarDate, status) VALUES (:userID, :calendarDate, :status)';
		$stmt = $conn->prepare($sql);
		    
	    //Bind the values;
	    foreach ($newDates as $date) {

	    	$stmt->bindValue(':userID', $_SESSION['userID']);
	    	$stmt->bindValue(':calendarDate', $date);
	    	$stmt->bindValue(':status', $statusMessage);

	    	$stmt->execute();

	    }

	 	header('Location: ?page=calendar');

	}


	// If selected status is at the office
	if( $status === 'out'  ) {

		$sql = 'DELETE FROM calendar WHERE userID = :userID AND calendarDate = :calendarDate';
	    $stmt = $conn->prepare($sql);
	    
	    foreach ($dates as $date) {

		    //Bind the values;
		    $stmt->bindValue(':userID', $_SESSION['userID']);
		    $stmt->bindValue(':calendarDate', $date);

		    // Fetch the query
	    	$stmt->execute();
		}

	 	header('Location: ?page=calendar');

	}



?>