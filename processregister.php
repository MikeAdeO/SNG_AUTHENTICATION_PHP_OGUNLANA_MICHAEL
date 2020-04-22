<?php
	include_once("lib/header.php") ;
	// print_r($_POST);
	
	//collecting Data
	$errorCount = 0;
	$first_name = $_POST["first_name"]!="" ? $_POST["first_name"]: $errorCount++;
	$last_name = $_POST["last_name"]!="" ? $_POST["last_name"]: $errorCount++;
	$email = $_POST["email"]!="" ? $_POST["email"]: $errorCount++;
	$gender = $_POST["gender"]!="" ? $_POST["gender"]: $errorCount++;
	$password = $_POST["password"]!="" ? $_POST["password"]: $errorCount++;
	$designation = $_POST["designation"]!="" ? $_POST["designation"]: $errorCount++;
	$department = $_POST["department"]!="" ? $_POST["department"]: $errorCount++;
	
	
	$_SESSION['first_name'] = $first_name;
	$_SESSION['last_name'] = $last_name;
	$_SESSION['email'] = $email;
	$_SESSION['gender'] = $gender;
	$_SESSION['password'] = $password;
	$_SESSION['designation'] = $designation;
	$_SESSION['department'] = $department;
	
	
	// Remove all illegal characters from email 
	$email = filter_var($email, FILTER_SANITIZE_EMAIL); 
	// if($errorCount > 0){
		
		// $session_error = "You have " . $errorCount . "error";
			// if($errorCount > 1){
				// $session_error .= "s";
			// }
			// $session_error .= "in your form submission";
			// $_SESSION["error"] = $session_error;
		// header("Location: register.php");
	// }
	// elseif( $last_name = "" || $first_name =""){
		 // $_SESSION["error"] = "registration failed , name cannot be empty";
				 // header("Location: register.php");
				 // die();
	// }
	if((empty($first_name)) || empty($last_name)){
		$_SESSION["error"] = "registration failed , name cannot be empty";
				 header("Location: register.php");
				 die();
				 
	}elseif((strlen($first_name) <= 2) || (strlen($last_name) <= 2)){
		$_SESSION["error"] = "registration failed , name cannot be less than two";
				 header("Location: register.php");
				 die();
	}elseif(preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $first_name)) {
		$_SESSION["error"] = "registration failed , input does not permit numbers";
				 header("Location: register.php");
				 die();
	} elseif(empty($email)){
		$_SESSION["error"] = "registration failed , email cannot be empty";
				 header("Location: register.php");
				 die();
	}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$_SESSION["error"] = "registration failed , your email needs to be written appropriately";
				 header("Location: register.php");
				 die();
	}elseif((strlen($email) <= 5)){
		$_SESSION["error"] = "registration failed , your email cannot be less than 5";
				 header("Location: register.php");
				 die();
	}
	else{
		
		$allUsers = scandir("db/users/");
		$countAllUsers = count($allUsers);
		$newUserId= ($countAllUsers - 1);
		$userObject = [
			"id" => 1,
			"first_name" => $first_name,
			"last_name" => $last_name,
			"email" => $email,
			"password" => password_hash($password, PASSWORD_DEFAULT),
			"gender" => $gender,
			"designation" => $designation,
			"accntType" => 0,
			"department" => $department,
			"date_reg" => date("D j F, Y; h:i a"),
			"loggedtime" => '' //Empty for login record..
		]; 
		
		//Check if user exist
		 for($counter = 0; $counter < $countAllUsers; $counter++){
			 $currentUser = $allUsers[$counter];
			 
			 if($currentUser == $email . ".json"){
				 $_SESSION["error"] = "registration failed , user already exist";
				 header("Location: register.php");
				 die();
				 session_destroy();
			 }
		 }
		
		//save to directory or database
				file_put_contents("db/users/".$email . ".json",json_encode($userObject));
			$_SESSION["message"] = "Registration Sucessful, you can now login!". $first_name;
			header("Location: login.php");
	}
	
	
include_once("lib/footer.php") ;?>	