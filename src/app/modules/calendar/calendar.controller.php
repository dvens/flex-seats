<?php 
	
	require('./app/core/connection.php');

	$day = isset($_GET['day']) ? $_GET['day'] : date('d');
	$month = isset($_GET['month']) ? $_GET['month'] : date('m');
	$year = isset($_GET['year']) ? $_GET['year'] : date('y');
	$runningDays = date('N', mktime(0, 0, 0, $month, 1, $year));

	$fullDate = $year . '-' . $month . '-' . $day;
	$currentMonth = $year . '-' . $month;

	$dates = getMonth($year, $month, $conn);
	$amountDesks = getFlexDesks($conn);
	$calendarHeadings = ['sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat'];

	$page = isset($_GET['page']) ? $_GET['page'] : 'home';

	// Get dates of current month
	function getMonth($year, $month, $conn) {

	    $amountDays =  date('t', mktime(0, 0, 0, $month, 1, $year));
	    
	    $date = new DateTime();
	    $dates = Array();

	    $sql = 'SELECT * FROM calendar WHERE userID = :userID';
	    $stmt = $conn->prepare($sql);
	    
	    //Bind the value
	    $stmt->bindValue(':userID', $_SESSION['userID']);
	    
	    //Execute query
	    $stmt->execute();
	    
	    //Fetch the query.
	    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		// For each day get the amount of employees and the status
	    for ($day = 1; $day <= $amountDays; $day++) {
	        
	        $date->setDate($year, $month, $day);
			$dates[$day]['day'] = $date->format('D');
			$dates[$day]['day-full'] = $date->format('d');
			$dates[$day]['date'] = $date->format('y-m-d');
			$dates[$day]['status'] = 'out';
			$dates[$day]['employees'] = getEmployees($dates[$day]['date'], $conn);
			$dates[$day]['disabled'] = false;

			// Check if the days are Sat or Sun to disabled them
			if( $dates[$day]['day'] === 'Sat' || $dates[$day]['day'] === 'Sun' ) {

				$dates[$day]['disabled'] = true;
				$dates[$day]['status'] = 'weekend';

			}

			// If the date is booked get the status out of the database
			foreach ($results as $result) {
				
				if ($result['calendarDate'] === '20'.$dates[$day]['date']) {
			    	
			    	$dates[$day]['status'] = $result['status'];

				} 

			}

	    }
	    
	    return $dates;

	}

	// Get the amount of employees
	function getEmployees($date, $conn) {

		$amountPeople = 0;

	    $sql = 'SELECT count(*) as amount FROM calendar WHERE calendarDate = :calendarDate AND status = :status';
	    $stmt = $conn->prepare($sql);

	    $stmt->bindValue(':calendarDate', $date);
	    $stmt->bindValue(':status', 'office');

	    //Execute query
	    $stmt->execute();
	    
	    //Fetch the query.
	    $result = $stmt->fetch(PDO::FETCH_ASSOC);

	    $amountPeople = $result['amount']; 

	    return $amountPeople;

	}

	// Get all FLEX desks
	function getFlexDesks($conn) {

		$amountAvailableDesks = 0;
		$amountFixedDesks = 0;

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

	    return $amountAvailableDesks - $amountFixedDesks;

	}

	// Formate date function
	function formatDate($format, $year, $month, $day, $stamp) {

		if(!$stamp) {

			return date($format, strtotime($year.'-'.$month.'-'.$day));
				
		} else {

			// If time stamp is set (+1 month, -1 month)
			return date($format, strtotime($year.'-'.$month.'-'.$day.$stamp));

		}	

	}

	function getCurrentDay() {
		return date('y-m-d');
	}

	function isCurrentDay($date) {

		// Check if current day is equal to parameter date
		if(getCurrentDay() === $date) {
			
			return true;

		} else {
			
			return false;

		}

	}

	function matchDay($date, $fullDate) {

		if($date === $fullDate) {
			
			return true;

		} else {
			
			return false;

		}

	}

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