<?php 
	$day = isset($_GET['day']) ? $_GET['day'] : date('d');
	$month = isset($_GET['month']) ? $_GET['month'] : date('m');
	$year = isset($_GET['year']) ? $_GET['year'] : date('y');

	$dates = getMonth($year, $month);

	function getMonth($year, $month) {

	    $amountDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);

	    $date = new DateTime();
	    $dates = Array();

	    // iterates through days 
	    // do one query 
	    for ($day = 1; $day <= $amountDays; $day++) {
	        
	        $date->setDate($year, $month, $day);
			$dates[$day]['date'] = $date->format('D');
			$dates[$day]['full-date'] = $date->format('y-m-d');
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

	function isCurrentDay($date) {

		if(getCurrentDay() === $date) {
			
			return true;

		} else {
			
			return false;

		}

	}
 
?>