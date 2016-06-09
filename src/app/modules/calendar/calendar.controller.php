<?php 
	$day = isset($_GET['day']) ? $_GET['day'] : date('d');
	$month = isset($_GET['month']) ? $_GET['month'] : date('m');
	$year = isset($_GET['year']) ? $_GET['year'] : date('y');

	$fullDate = $year . '-' . $month . '-' . $day;
	$currentMonth = $year . '-' . $month;

	$dates = getMonth($year, $month);

	function getMonth($year, $month) {

	    $amountDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);

	    $date = new DateTime();
	    $dates = Array();

	    // iterates through days 
	    // do one query 
	    for ($day = 1; $day <= $amountDays; $day++) {
	        
	        $date->setDate($year, $month, $day);
			$dates[$day]['day'] = $date->format('D');
			$dates[$day]['day-full'] = $date->format('d');
			$dates[$day]['date'] = $date->format('y-m-d');
			$dates[$day]['status'] = true;

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

	function matchDay($date, $fullDate) {

		if($date === $fullDate) {
			
			return true;

		} else {
			
			return false;

		}

	}
 
?>