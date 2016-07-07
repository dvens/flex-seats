<?php 
	
	require('./app/core/connection.php');

	$day = isset($_GET['day']) ? $_GET['day'] : date('d');
	$month = isset($_GET['month']) ? $_GET['month'] : date('m');
	$year = isset($_GET['year']) ? $_GET['year'] : date('y');
	$runningDays = date('N', mktime(0, 0, 0, $month, 1, $year));

	$fullDate = $year . '-' . $month . '-' . $day;
	$currentMonth = $year . '-' . $month;

	$dates = getMonth($year, $month, $conn);
	$pageData = getPageData($fullDate, $conn);
	$amountDesks = getDesks($conn);
	$calendarHeadings = ['sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat'];

	$page = isset($_GET['page']) ? $_GET['page'] : 'home';

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

			foreach ($results as $result) {
				
				if ($result['calendarDate'] === '20'.$dates[$day]['date']) {
			    	
			    	$dates[$day]['status'] = $result['status'];

				} 

			}

	    }
	    
	    return $dates;

	}

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
	function getDesks($conn) {

		$amountAvailableDesks = 0;

		$flexstatus = 'flex';

		$sql = 'SELECT count(*) as amount FROM desk WHERE status = :flexstatus';
	    $stmt = $conn->prepare($sql);

	    $stmt->bindValue(':flexstatus', $flexstatus);
	    
	    //Execute query
	    $stmt->execute();
	    
	    //Fetch the query.
	    $result = $stmt->fetch(PDO::FETCH_ASSOC);

	    $amountAvailableDesks = $result['amount'];

	    return $amountAvailableDesks;

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

	function isCurrentMonth($date) {

		$currentMonth = date('y-m');

		// Check if date is equal to current month
		if($date === $currentMonth) {

			return true;

		} else {

			return false;

		}

	}	

	function isCurrentDay($date) {

		// Check if current day is equal to parameter date
		if(getCurrentDay() === $date) {
			
			return true;

		} else {
			
			return false;

		}

	}

	function getPageData($date, $conn) {

		$sql = 'SELECT * FROM calendar WHERE userID = :userID AND calendarDate = :calendarDate';
	    $stmt = $conn->prepare($sql);
	    
	    //Bind the value
	    $stmt->bindValue(':userID', $_SESSION['userID']);
	    $stmt->bindValue(':calendarDate', $date);
	    
	    //Execute query
	    $stmt->execute();
	    
	    //Fetch the query.
	    $result = $stmt->fetch(PDO::FETCH_ASSOC);

	    if(!empty($result)) {
	    	
	    	return $result;	 

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
 
?>