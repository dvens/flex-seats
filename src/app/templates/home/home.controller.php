<?php 

	require('./app/core/connection.php');

	if(!(isset($_SESSION['user']))) {
		header('Location: ?page=login');
	}

	if((isset($_GET['logout']))) {

		session_destroy();
		header('Location: ?page=login');

	}

	// Check if there are any desks left.
	function getAvailability($date, $conn) {

		$amountAvailableDesks = 0;
		$amountFixedDesks = 0;
		$amountPeople = 0;

		$flexstatus = 'flex';
		$fixedstatus = 'fixed';

		// Get flex desks
		$sql = 'SELECT count(*) as amount FROM desk WHERE status = :flexstatus';
	    $stmt = $conn->prepare($sql);

	    $stmt->bindValue(':flexstatus', $flexstatus);
	    
	    //Execute query
	    $stmt->execute();
	    
	    //Fetch the query.
	    $result = $stmt->fetch(PDO::FETCH_ASSOC);

	    $amountAvailableDesks = $result['amount'];

	    // Get fixed desks
	    $sql = 'SELECT count(*) as amount FROM desk WHERE status = :fixedstatus';
	    $stmt = $conn->prepare($sql);
	    $stmt->bindValue(':fixedstatus', $fixedstatus);
	    
	    //Execute query
	    $stmt->execute();
	    
	    //Fetch the query.
	    $result = $stmt->fetch(PDO::FETCH_ASSOC);
	    $amountFixedDesks = $result['amount'];

	    // Get amount of people booked for selected day
	    $sql = 'SELECT count(*) as amount FROM calendar WHERE calendarDate = :calendarDate AND status = :status';
	    $stmt = $conn->prepare($sql);

	    $stmt->bindValue(':calendarDate', $date);
	    $stmt->bindValue(':status', 'office');

	    //Execute query
	    $stmt->execute();
	    
	    //Fetch the query.
	    $result = $stmt->fetch(PDO::FETCH_ASSOC);

	    $amountPeople = $result['amount']; 

	    return $amountAvailableDesks - $amountPeople - $amountFixedDesks;

	}

	// Page specific methods
	if(isset($_POST['action'])) {

		$date = isset($_POST['date']) ? '20' . $_POST['date'] : null;
		$status = isset($_POST['action']) ? $_POST['action'] : null;
		$time = strtotime($date);
		$statusMessage = '';

		if($status === 'no') {

			// If there are no desks available return an error message
			if( getAvailability($date, $conn) === 0 ) {

				$_SESSION['formWarning'] = 'There are no desks available for ' . date('d', $time) . date(' M', $time);
				header('Location: ?page=home&month=' . date('m', $time) .'&year=' . date('y', $time) . '&day=' . date('d', $time));
				exit;
			}

			$statusMessage = 'office';

			$sql = 'INSERT INTO calendar (userID, calendarDate, status) VALUES (:userID, :calendarDate, :status)';
		    $stmt = $conn->prepare($sql);
		    
		    //Bind the values;
		    $stmt->bindValue(':userID', $_SESSION['userID']);
		    $stmt->bindValue(':calendarDate', $date);
		    $stmt->bindValue(':status', $statusMessage);
		 	
		    // Fetch the query
		    $result = $stmt->execute();

		    header('Location: ?page=home&month=' . date('m', $time) .'&year=' . date('y', $time) . '&day=' . date('d', $time));

		}

		if($status === 'yes') {

			$sql = 'DELETE FROM calendar WHERE userID = :userID AND calendarDate = :calendarDate';
		    $stmt = $conn->prepare($sql);
		    
		    //Bind the values;
		    $stmt->bindValue(':userID', $_SESSION['userID']);
		    $stmt->bindValue(':calendarDate', $date);
		 	
		    // Fetch the query
		    $stmt->execute();

		    header('Location: ?page=home&month=' . date('m', $time) .'&year=' . date('y', $time) . '&day=' . date('d', $time));

		}

	}

?>