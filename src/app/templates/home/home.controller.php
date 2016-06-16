<?php 

	require('./app/core/connection.php');

	if(!(isset($_SESSION['user']))) {
		header('Location: ?page=login');
	}

	if((isset($_GET['logout']))) {

		session_destroy();
		header('Location: ?page=login');

	}

	// Page specific methods
	if(isset($_POST['action'])) {

		$date = isset($_POST['date']) ? '20' . $_POST['date'] : null;
		$status = isset($_POST['action']) ? $_POST['action'] : null;
		$statusMessage = '';

		if($status === 'yes') {

			$statusMessage = 'home';

			$sql = 'INSERT INTO calendar (userID, calendarDate, status) VALUES (:userID, :calendarDate, :status)';
		    $stmt = $conn->prepare($sql);
		    
		    //Bind the values;
		    $stmt->bindValue(':userID', $_SESSION['userID']);
		    $stmt->bindValue(':calendarDate', $date);
		    $stmt->bindValue(':status', $statusMessage);
		 	
		    // Fetch the query
		    $result = $stmt->execute();

		    $time = strtotime($date);
		    header('Location: ?page=home&month=' . date('m', $time) .'&year=' . date('y', $time) . '&day=' . date('d', $time));

		}

		if($status === 'no') {

			$statusMessage = 'home';

			$sql = 'DELETE FROM calendar WHERE userID = :userID AND calendarDate = :calendarDate';
		    $stmt = $conn->prepare($sql);
		    
		    //Bind the values;
		    $stmt->bindValue(':userID', $_SESSION['userID']);
		    $stmt->bindValue(':calendarDate', $date);
		 	
		    // Fetch the query
		    $stmt->execute();

		    $time = strtotime($date);
		    header('Location: ?page=home&month=' . date('m', $time) .'&year=' . date('y', $time) . '&day=' . date('d', $time));

		}

	}

?>