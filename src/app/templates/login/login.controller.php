<?php 
	
	require_once('./app/core/connection.php');

	if((isset($_SESSION['user']))) {
		header('Location: ?page=home');
	}

	if(isset($_POST['login'])) {

		$emailaddress = (isset($_POST['emailaddress']) ? $_POST['emailaddress'] : null);
		$password = (isset($_POST['password']) ? $_POST['password'] : null);

		$sql = 'SELECT * FROM users WHERE emailaddress = :emailaddress';

		$stmt = $conn->prepare($sql);
	    
	    //Bind the value
	    $stmt->bindValue(':emailaddress', $emailaddress);
	    
	    //Execute query
	    $stmt->execute();
	    
	    //Fetch the query.
	    $result = $stmt->fetch(PDO::FETCH_ASSOC);

	    if(!$result) {

	    	$app->setErrorMessage('The email address or password is not matching.');
	    	header('Location: ?page=login');
    		exit;

	    } else {

	    	if($result['password'] === $password) {

	    		$_SESSION['user'] = $result['surname'];
	    		$_SESSION['email'] = $result['emailaddress'];
	    		$_SESSION['userID'] = $result['ID'];
	    		$_SESSION['userRole'] = $result['role'];
	    		$_SESSION['gender'] = $result['gender'];

	    		header('Location: ?page=home');

	    	} else {

	    		$app -> setErrorMessage('Wrong password try again!');
	    		header('Location: ?page=login');
    			exit;

	    	}

	    }

	}

?>