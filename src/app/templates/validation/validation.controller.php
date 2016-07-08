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
    		header('Location: ?page=validation');
    		exit;

    	} else {

    		$_SESSION['validated'] = true;
    		$_SESSION['validationCode'] = $validationCode;
    		
    		header('Location: ?page=register');

    	}

	}

?>
