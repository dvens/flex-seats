<?php 

	require_once('./app/core/connection.php');

	if((isset($_SESSION['validated']))) {
		
		header('Location: ?page=register');

	}	
	
	if(isset($_POST['validate'])) {

		// Set form variables
		$validationCode = (isset($_POST['validation']) ? $_POST['validation'] : null );

		// Prepare and retrieve validation code
		$sql = 'SELECT * FROM validation WHERE validationCode = :validationCode';
		$stmt = $conn->prepare($sql);

		// Bind the value
    	$stmt->bindValue(':validationCode', $validationCode);
    
    	// Execute the query
    	$stmt->execute();

    	// Fetch
    	$code = $stmt->fetch(PDO::FETCH_ASSOC);

    	if(!$code) {
    		
    		$app -> setErrorMessage("You've not entered the right validation code: ". $validationCode ." try again.");

    	} else {

    		$_SESSION['validated'] = true;
    		$_SESSION['validationCode'] = $validationCode;
    		
    		header('Location: ?page=register');

    	}

	}

?>

<!-- 
		$sql = "INSERT INTO users (emailaddress, surname, password, deskID) VALUES (:emailaddress, :surname, :password, :deskID)";
	    $stmt = $conn->prepare($sql);
	    
	    //Bind the values;
	    $stmt->bindValue(':emailaddress', $emailaddress);
	    $stmt->bindValue(':surname', $surname);
	    $stmt->bindValue(':password', $password);
	    $stmt->bindValue(':deskID', $deskID);
	 	
	    // Fetch the query
	    $result = $stmt->execute();
	    
	    if($result){

	    	$GLOBALS['formMessage'] = 'Thanks '. $surname .' for registering at Damco Seats';
	    	header('Location: ?page=login');
	    
	    } -->