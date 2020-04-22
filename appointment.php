<?php include_once("lib/header.php"); if(!$_SESSION["loggedIN"] && !isset($_SESSION["email"])){
		header("Location: login.php");
	}
	
	function accntType($type) {
		switch($type) {
			case "0":
				$accntType = 'User';
			break;
			case "1":
				$accntType = 'Moderator';
			break;
			case "2":
				$accntType = 'Super Admin';
			break;
		}
		return $accntType;
	}
	
   $email = $_SESSION['email'];
	require_once("functions/alert.php");	?>
	<style>
			<?php include 'css/side.css'; ?>
	</style>
	<div class="sidenav">
			<h4 class="container" style="border-bottom: 2px solid #f2f2f2; color:#818181;">Appointment</h4>
			<a href="patients.php">My Profile</a>
			<a href="dashboard.php">Dashboard</a>
			<a href="appointment.php">Book Appointment</a>
			<a href="bills.php">Pay Bill</a>
			
	</div>
	<div class="main">
	<div class="container">
	
	
			<div class=" row col-8">
			<!--==<p><strong>Welcome, please Register</strong></p>-->
			</div>
			<div class=" row col-8">
			<h3>Book an Appointment</h3>
			</div>
			<div class=" row col-8">
			<p>All Fields are required </p>
				</div>
			<div class="row col-8">
			<form method="POST" action="processBooking.php">
				<p>
					<?php
						print_alert();
					?>
				</p>
				<p>
					
					
					<input type="email" class ="form-control" name="patient_name" value="<?php 
						if(isset($_SESSION["email"])){
							$allUsers = scandir("db/users/");
							$countAllUsers = count($allUsers);
		for($counter= 0; $counter < $countAllUsers ; $counter++){
			$currentUser = $allUsers[$counter];
			
				if($currentUser == $email. ".json"){
					$userString = file_get_contents("db/users/".$currentUser);
					$userObject = json_decode($userString);
					 $first_name = $userObject->first_name;
					 $last_name = $userObject->last_name;
						echo $first_name ." ". $last_name;
					 
					 
						}
						}
						}
					
					?> "   hidden readonly/>
					
				</p>
				<p>
					<label>Date of Appointment</label><br />
					<input type="date" class ="form-control" name="date_of_appointment" placeholder="yyyy-mm-dd" min="2020-04-01" max="2026-12-31" required>
				</p>
				<p>
					<label>Time of Appointment</label><br />
					<input type="time" class ="form-control"  name="time_of_appointment" min="09:00" max="15:00" >
					<small style=" font-size:11px;">Available appointment time is between 9AM and 3PM.</small>
					<small style="color:brown; font-size:11px;">Please , choose either AM or PM after selecting the time</small>

				</p>
				<p>
					<label>Nature of Appointment</label><br />
					<textarea class ="form-control" type="email" name="nature_of_appointment" placeholder=""></textarea>
					
				</p>
				<p>
					<label>Initial complaints</label><br />
					<textarea class ="form-control" type="email" name="initial_complain" placeholder=""></textarea>
					
				</p>
				<p>
					<label>Department</label><br />
						<select name="department" class="form-control">
							<option value="">Select One</option>
							<option value="Antenatal">Antenatal</option>
							<option value="Dental">Dental</option>
							<option value="Pharmacy">Pharmacy</option>
							<option value="PhysioTherapy">Physiotherapy</option>
							<option value="Pediatrics">Pediatrics</option>
							<option value="Accidents & Emergency">Accidents & Emergency</option>
							<option value="General care">General Care</option>
						</select>
					
				</p>
				
				
				
				
				<p>
					<button type="submit" class="btn btn-success" name="book_app">Book Appointment</button>
				</p>
				
			</form>
	</div>
	</div>
	</div>


<?php include_once("lib/footer.php") ;?>	