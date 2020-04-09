<?php 

	include_once("lib/header.php") ;
	
	if(!isset($_SESSION["loggedIN"])){
		//redirect to homepage
		header("Location: login.php");
	}
	;?>
		<h2>DashBoard</h2>
		
		<h3>Logged In User ID: <?php echo $_SESSION["loggedIN"] ?></h3>
		<p>Welcome, <?php echo $_SESSION["full_name"] ?>, you are logged in as <?php echo $_SESSION["role"]?>, 
			and your ID is <?php echo $_SESSION["loggedIN"] ?>.
		</p>
<?php include_once("lib/footer.php") ;?>	