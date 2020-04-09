<?php
	include_once("lib/header.php") ;
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
	?>
		<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
		
			  <h4 class="display-4">MEDICALS USER-PROFILE</h4>
			  <p class="lead">This is a specialist hospital to cure ignorance</p>
			  <p class="lead">Come as you are, it is completely free!</p>
				
			</div>
		<h3 class="pricing-header px-3 py-3 pt-md-5 pb-md-4 ">	
	<?php
	//Since User is logged, then we need to access the file having user email...
	$file = 'db/users/'.$_SESSION["loggedIN"].'.json';
	$getContent = file_get_contents($file);
	//Response is stored in a json format and needs to be decoded...
	$decodeResp = json_decode($getContent);
	echo 'Name : '.ucwords($decodeResp->first_name." ".$decodeResp->last_name) .'<br>';
	echo 'Email Address :  '.strtolower($_SESSION["loggedIN"]) .'<br>';
	echo 'Member Type :  '.accntType($decodeResp->accntType) .'<br>';
	echo 'Date Registered :  '.ucwords($decodeResp->date_reg) .'<br>';
	echo 'Gender :  '.ucwords($decodeResp->gender) .'<br>';
	echo 'Designation : '.ucwords($decodeResp->designation) .'<br>';
	echo 'Department : '.ucwords($decodeResp->department) .'<br>';
	echo 'Login Time : '.ucwords($decodeResp->loggedtime) .'<br>';
	?>
	</h3>
	
<?php include_once("lib/footer.php") ;?>