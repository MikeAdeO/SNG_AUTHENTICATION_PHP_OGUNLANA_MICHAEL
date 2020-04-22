<?php
session_start();
if(!$_SESSION["loggedIN"] && !isset($_SESSION["email"])){
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
$email = $_SESSION["email"];
$getusrFile = file_get_contents("db/users/".$email.".json");
$userResp = json_decode($getusrFile);
// print_r($userResp);
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css"/>

		
		
<html>
    <head>
        <title>AppointMent List</title>
		<style>
			<?php include "css/side.css" ;?>
		</style>
    </head>
	
    <body>
	<div class="sidenav" style="height: 100% !important;">
			<h4 class="container" style="border-bottom: 2px solid #f2f2f2; color:#818181;">User ID<br><span style="font-size:16px;"><?php echo $_SESSION["loggedIN"] ?></span></h4>
			<a href="medicalTeam.php">My Profile</a>
			<a href="dashboarddoc.php">Dashboard</a>
			
			
	</div>
	<div class="main">
        <h2 align="center">Appointment List</h2>
        

		<hr>
		<div class="container">
				
			<div class="col-12" style='margin-bottom: 2%'>
				<font size='4px'><b><a href="dashboarddoc.php" style='text-decoration: none'>Appointment</a>  &raquo; Manage Appointment</b></font><br>
			</div>
			
			
			
			<div class="col-12" style='margin-bottom: 2%'>
				<div class="table-responsive">
					<table class="table table-striped  table-bordered table-hover">
						<tr>
							
							<th>S/N</th>
							<th>Patient's Name</th>
							<th>Date of Appointment</th>
							<th>time of Appointment</th>
							<th>Nature of Appointment</th>
							<th>Initial Complain</th>
							<th>Department</th>
							
						</tr>
						<tr>
						<?php
						
						//all users
						$allUsers = scandir("db/users/");
						
							$start_count = 1;
							$allBookings = scandir("db/bookings/");
							$countAllBookings = count($allBookings);
							for($counter = 0; $counter < $countAllBookings; $counter++) {
								$currentBookings = $allBookings[$counter]; 
								
								if($countAllBookings < 1){ // sir, please, help me , there is nothing in my database but it kept showing two,i display, it shows fullstop and ellipsis, i will working on it though
									//print_r("you have no pending notification") ;
									echo "<script type='text/javascript'>alert('you have no pending appointments');</script>";
										
									
								}
								
								if(strlen($currentBookings) > 5) { //To remove invalid account...
									//Open json file...
									$getFile = file_get_contents("db/bookings/".$currentBookings);
									$decodeResp = json_decode($getFile);
									
									if(strtolower($userResp->department) == strtolower($decodeResp->department)) {
								
								?>
								
								<td><?php echo $start_count++;?></td>
								<td><?php echo $decodeResp->patient_name;?></td>
								<td><?php echo $decodeResp->date_of_appointment;?></td>
								<td><?php echo $decodeResp->time_of_appointment;?></td>
								<td><?php echo $decodeResp->nature_of_appointment;?></td>
								<td><?php echo $decodeResp->initial_complain;?></td>
								<td><?php echo $decodeResp->department;?></td>
								
							</tr>
						<?php }
							}
						} ?>
					</table>
				
				</div>
			</div>
			
		</div>
		</div>
				
			
	</body>
</html>