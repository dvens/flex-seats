<?php
	
	require_once('./app/core/connection.php');

	if(!(isset($_SESSION['user']))) {
		
		header('Location: ?page=home');

	}

	$userData = getUser($conn);

	if( isset($_POST['save']) ) {

		$emailaddress = (isset($_POST['emailaddress']) ? $_POST['emailaddress'] : null);
		$surname = (isset($_POST['surname']) ? $_POST['surname'] : null);
		$password = (isset($_POST['password']) ? $_POST['password'] : null);
		$deskType = (isset($_POST['desk']) ? $_POST['desk'] : null);

		if(empty($emailaddress) || empty($surname) || empty($password)) {
	    	
	    	$app -> setErrorMessage('Please do not let any fields empty!');
	    	return;

	    }

	    if($deskType === 'flex') {

	    	$sql = 'DELETE FROM desk WHERE userID = :userID';
		    $stmt = $conn->prepare($sql);
		    
		    //Bind the values;
		    $stmt->bindValue(':userID', $_SESSION['email']);
		 	
		    // Fetch the query
		    $stmt->execute();

	    }

	    if($deskType === 'fixed') {

			$sql = 'INSERT INTO desk (status, userID) VALUES (:status, :userID)';
	    	$stmt = $conn->prepare($sql);
	    
	    	//Bind the values;
	   	 	$stmt->bindValue(':status', $deskType);
	    	$stmt->bindValue(':userID', $emailaddress);
	 	
	    	// Fetch the query
	    	$stmt->execute();

		}

		$sql = 'UPDATE users SET emailaddress = :emailaddress,
								 surname = :surname,
								 password = :password,
								 deskType = :deskType
								 WHERE ID = :ID';
								 
		$stmt = $conn->prepare($sql);

		$stmt->bindValue(':ID', $_SESSION['userID']);
		$stmt->bindValue(':emailaddress', $emailaddress);
		$stmt->bindValue(':surname', $surname);
		$stmt->bindValue(':password', $password);
		$stmt->bindValue(':deskType', $deskType);

		$stmt->execute();

		$app -> setFormMessage("You've update your profile!");
		header('Location: ?page=account');
		exit;

	}

	function getUser($conn) {

		$sql = 'SELECT * FROM users WHERE ID = :ID';
	    $stmt = $conn->prepare($sql);
	    
	    //Bind the value
	    $stmt->bindValue(':ID', $_SESSION['userID']);
	    
	    //Execute query
	    $stmt->execute();
	    
	    //Fetch the query.
	    $result = $stmt->fetch(PDO::FETCH_ASSOC);

	    return $result;

	}

?>