<?php 

	include_once("lib/header.php") ;
	
	if(!isset($_SESSION["loggedIN"])){
		//redirect to homepage
		header("Location: login.php");
	}
	;?>
		
<?php include_once("lib/footer.php") ;?>	