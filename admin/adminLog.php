<?php
session_start();
	// print_r($_POST);

	
	$errorCount = 0;
	$email = $_POST["email"] != "" ? $_POST["email"] : $errorCount++;
	$password =  $_POST["password"] !="" ? $_POST["password"] : $errorCount;
	
	$_SESSION["email"] = $email;
	
	if($errorCount > 0){
		$session_error = "You have " . $errorCount . "error";
			if($errorCount > 1){
				$session_error .= "s";
			}
			$session_error .= "in your form submission";
			$_SESSION["error"] = $session_error;
		header("Location: Login.php");
	}else{
		$allUsers = scandir("../db/users/");
		
		
		$countAllUsers = count($allUsers);
		
		for($counter= 0; $counter < $countAllUsers ; $counter++){
			$currentUser = $allUsers[$counter];
			
				if($currentUser == $email. ".json"){
					$userString = file_get_contents("../db/users/".$currentUser);
					$userObject = json_decode($userString);
					$passwordFromDB = $userObject->password;
					 
					$passwordFromUser = password_verify($password,$passwordFromDB );
					if($passwordFromDB == $passwordFromUser){
						
						//redirect to dashboard
						$_SESSION["loggedIN"]= $userObject-> email;
						$_SESSION["email"]= $userObject-> email;
						
						$_SESSION["access"]= $userObject->accntType;
						if($userObject->accntType > 0){ #ot a member...
							header("Location:dashboard.php");
						} else {
							$_SESSION["error"] = "Unauthorized access, you are not an admin";
						}
						unset($_SESSION["error"]); //Remove all other related error since this is successful...
						die();
					} else {
						$_SESSION["error"] = "invalid password";
					}
					
				} else { //Email not found
					$_SESSION["error"] = "invalid email address";
				}
		}
		
		header("Location: index.php");
		die();
	}
  ?>	