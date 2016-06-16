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

		if(empty($emailaddress) || empty($surname) || empty($password)) {
	    	
	    	$GLOBALS['formError'] = 'Please do not let any fields empty!';
	    	return;

	    }

		$sql = 'UPDATE users SET emailaddress = :emailaddress,
								 surname = :surname,
								 password = :password
								 WHERE ID = :ID';
		$stmt = $conn->prepare($sql);

		$stmt->bindValue(':ID', $_SESSION['userID']);
		$stmt->bindValue(':emailaddress', $emailaddress);
		$stmt->bindValue(':surname', $surname);
		$stmt->bindValue(':password', $password);

		$stmt->execute();

		header('Location: ?page=account');

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