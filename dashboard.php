<?php 

	include_once("lib/header.php") ;
	
	if(!isset($_SESSION["loggedIN"])){
		//redirect to homepage
		header("Location: login.php");
	}
	;?>
		<style>
			<?php include "css/side.css" ;?>
		</style>
		
		<div class="sidenav">
			<h4 class="" style="border-bottom: 2px solid #f2f2f2; color:#818181;">User ID<br><span style="font-size:16px;"><?php echo $_SESSION["loggedIN"] ?></span></h4>
			<a href="patients.php">My Profile</a>
			<a href="appointment.php">Book Appointment</a>
			<a href="bills.php">Pay Bill</a>
			
	</div>
	<div class="main">
		<p>Welcome, <?php echo $_SESSION["full_name"] ?>, you are logged in as <?php echo $_SESSION["role"]?>,</p>
		<p>your ID is <?php echo $_SESSION["loggedIN"] ?>.</p>
	</div>
<?php include_once("lib/footer.php") ;?>	