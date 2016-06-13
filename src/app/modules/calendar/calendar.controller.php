<?php 
	
	require_once('./app/core/connection.php');

	$day = isset($_GET['day']) ? $_GET['day'] : date('d');
	$month = isset($_GET['month']) ? $_GET['month'] : date('m');
	$year = isset($_GET['year']) ? $_GET['year'] : date('y');

	$fullDate = $year . '-' . $month . '-' . $day;
	$currentMonth = $year . '-' . $month;

	$dates = getMonth($year, $month, $conn);
	$pageData = getPageData($fullDate, $conn);

	if(isset($_POST['action'])) {

		// check if date is already in calendar;

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

	function getMonth($year, $month, $conn) {

	    $amountDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);

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
			$dates[$day]['status'] = true;

			foreach ($results as $result) {
				
				if ($result['calendarDate'] === '20'.$dates[$day]['date']) {
			    	
			    	$dates[$day]['status'] = false;

				} 

			}

	    }
	    
	    return $dates;

	}

	function formatDate($format, $year, $month, $day, $stamp) {

		if(!$stamp) {

			return date($format, strtotime($year.'-'.$month.'-'.$day));
				
		} else {

			return date($format, strtotime($year.'-'.$month.'-'.$day.$stamp));

		}	

	}

	function getCurrentDay() {
		return date('y-m-d');
	}

	function isCurrentMonth($date) {

		$currentMonth = date('y-m');

		if($date === $currentMonth) {

			return true;

		} else {

			return false;

		}

	}	

	function isCurrentDay($date) {

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