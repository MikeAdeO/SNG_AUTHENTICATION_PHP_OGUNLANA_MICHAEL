<?php  include_once("lib/header.php") ;

	$errorCount = 0;
	$patient_name = $_POST["patient_name"]!="" ? $_POST["patient_name"]: $errorCount++;
	$date_of_appointment = $_POST["date_of_appointment"]!="" ? $_POST["date_of_appointment"]: $errorCount++;
	$time_of_appointment = $_POST["time_of_appointment"]!="" ? $_POST["time_of_appointment"]: $errorCount++;
	$nature_of_appointment = $_POST["nature_of_appointment"]!="" ? $_POST["nature_of_appointment"]: $errorCount++;
	$initial_complain = $_POST["initial_complain"]!="" ? $_POST["initial_complain"]: $errorCount++;
	$department = $_POST["department"]!="" ? $_POST["department"]: $errorCount++;
	
	$_SESSION['patient_name'] = $patient_name;
	$_SESSION['date_of_appointment'] = $date_of_appointment;
	$_SESSION['time_of_appointment'] = $time_of_appointment;
	$_SESSION['nature_of_appointment'] = $nature_of_appointment;
	$_SESSION['initial_complain'] = $initial_complain;
	$_SESSION['department'] = $department;



	if((empty($patient_name)) || (empty($date_of_appointment)) || (empty($time_of_appointment)) || (empty($nature_of_appointment)) || (empty($initial_complain)) || (empty($department))){
		$_SESSION["error"] = "Appointment failed! All fields must be filled";
		header("Location: appointment.php");
		die();
	}elseif($errorCount > 0){
		$_SESSION["error"] = "failed!";
		header("Location: appointment.php");
		die();
	}else{
		$allBookings = scandir("db/bookings/");
		$countAllBookings = count($allBookings);
		$newBookingsId= ($countAllBookings - 1);
		$bookingsObject = [
			"id" => 1,
			"patient_name" => $patient_name,
			"date_of_appointment" => $date_of_appointment,
			"time_of_appointment" => $time_of_appointment,
			"nature_of_appointment" => $nature_of_appointment,
			"initial_complain" => $initial_complain,
			"department" => $department
			
		];
		/////

		
				//storing bookings/ appointment in the database
			file_put_contents("db/bookings/".$department . ".json",json_encode($bookingsObject));
			$_SESSION["message"] = "Appointment  Sucessful, the doctors would notify you soon!"." ". $first_name;
			header("Location: appointment.php");
	}
include_once("lib/footer.php") ;?>	 