<?php 
	
	require_once('./app/core/connection.php');

	if(!(isset($_SESSION['validated']))) {
		header('Location: ?page=validation');
	}

	if((isset($_SESSION['user']))) {
		header('Location: ?page=home');
	}
	
	if(isset($_POST['register'])) {

		$emailaddress = (isset($_POST['emailaddress']) ? $_POST['emailaddress'] : null);
		$surname = (isset($_POST['surname']) ? $_POST['surname'] : null);
		$password = (isset($_POST['password']) ? $_POST['password'] : null);
		$deskID = 0;
		$role = 'user';

		$sql = 'SELECT * FROM users WHERE emailaddress = :emailaddress';
	    $stmt = $conn->prepare($sql);
	    
	    //Bind the value
	    $stmt->bindValue(':emailaddress', $emailaddress);
	    
	    //Execute query
	    $stmt->execute();
	    
	    //Fetch the query.
	    $result = $stmt->fetch(PDO::FETCH_ASSOC);

	    if(empty($emailaddress) || empty($surname) || empty($password)) {
	    	
	    	$app -> setErrorMessage('Please fill in all required* fields');
	    	return;

	    }

	    // Check if username exists
	    if($result['emailaddress']){
	       
	       $app -> setErrorMessage('This email address: '. $emailaddress .' already exists');
	       return;

		}

		$sql = 'INSERT INTO users (emailaddress, surname, password, deskID, role) VALUES (:emailaddress, :surname, :password, :deskID, :role)';
	    $stmt = $conn->prepare($sql);
	    
	    //Bind the values;
	    $stmt->bindValue(':emailaddress', $emailaddress);
	    $stmt->bindValue(':surname', $surname);
	    $stmt->bindValue(':password', $password);
	    $stmt->bindValue(':deskID', $deskID);
	    $stmt->bindValue(':role', $role);
	 	
	    // Fetch the query
	    $result = $stmt->execute();
	    
	    if($result){

			$app -> setFormMessage('Thanks '. $surname .' for registering at Damco Seats.');
	    	header('Location: ?page=login');
	    	exit;

	    }

	}

?>