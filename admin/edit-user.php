<?php
   session_start(); //starts the session
   require_once("../functions/alert.php");
   
	if($_SESSION['email']){ // checks if the user is logged in  
		$email = $_SESSION['email'];
		//Get content...
		$getcontent = file_get_contents("../db/users/".$email.".json");
		//Decode the content...
		$arrContent = json_decode($getcontent);
		if($arrContent->accntType == 0) {
			header("location: index.php"); // user is not an admin...
		}
	} else{
		header("location: index.php"); // redirects if user is not logged in
	}
	
date_default_timezone_set("Africa/Lagos");  # i use  this to set normal time....
   
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://stackpath. bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css"/>

<html>
    <head>
        <title>Edit User</title>
    </head>
	
    <body>
        <h2 align="center">ADMIN DASHBOARD</h2>
        

		<hr>
		<div class="container">
				
				<div class="col-12" style='margin-bottom: 2%'>
					<font size='4px'><b><a href="dashboard.php" style='text-decoration: none'>Dashboard</a>  &raquo; Edit User</b></font><br>
				</div>
				
				<?php 
				
				
				//Which file are we editing...
				$editEmail = base64_decode($_REQUEST["editEmail"]); //Decode the server...
				$getFile = file_get_contents("../db/users/".$editEmail.".json");
				$decodeResp = json_decode($getFile);
				$first_name = $decodeResp->first_name;
				$last_name = $decodeResp->last_name;
				$emailaddr = $decodeResp->email;
				$gender = $decodeResp->gender;
				$designation = $decodeResp->designation;
				$department = $decodeResp->department;
				$accntType = $decodeResp->accntType;
				$password = $decodeResp->password;
				$date_reg = $decodeResp->date_reg;
				$loggedtime = $decodeResp->loggedtime;
				
				if(isset($_POST["editUser"])) {
					$first_name = $_POST["first_name"];
					$last_name = $_POST["last_name"];
					$gender = strtolower($_POST["gender"]);
					$designation = strtolower($_POST["designation"]);
					$department = ucfirst($_POST["department"]);
					$accntType = strtolower($_POST["accntType"]);
					
					$userObject = [
						"id" => 1,
						"first_name" => $first_name,
						"last_name" => $last_name,
						"email" => $emailaddr,
						"password" => $password,
						"gender" => $gender,
						"designation" => $designation,
						"accntType" => $accntType,
						"department" => $department,
						"date_reg" => $date_reg,
						"loggedtime" => $loggedtime
					]; 
					
					$fp = fopen("../db/users/".$emailaddr.'.json', 'w+');
					if(fwrite($fp, json_encode($userObject))) {
						echo "<div class='alert alert-success'>User modified successfully</div>";
					} else {
						echo "<div class='alert alert-success'>Error modifying User</div>";
					}					
				}
				
				?>
				
				<form method="post">
					<div class="row">
						
						<div class="col-12" style='margin-bottom: 2%'>
							<label for='first_name'><b>First Name</b></label>
							<input type="text" name="first_name" id="first_name" value="<?php if(isset($first_name)) { echo $first_name; } ?>" class="form-control" placeholder="Enter first name" required>
						</div>
						
						<div class="col-12" style='margin-bottom: 2%'>
							<label for='last_name'><b>Last Name</b></label>
							<input type="text" name="last_name" id="last_name" value="<?php if(isset($last_name)) { echo $last_name; } ?>" class="form-control" placeholder="Enter last name" required>
						</div>
						
						<div class="col-12" style='margin-bottom: 2%'>
							<label for='emailaddr'><b>Email Address</b></label>
							<input type="text" value="<?php if(isset($emailaddr)) { echo $emailaddr; } ?>" class="form-control" placeholder="Enter last name" disabled>
						</div>
						
						<div class="col-6" style='margin-bottom: 2%'>
							<label for='gender'><b>Gender</b></label>
							<select name="gender" id="gender" class="form-control" required>
								<option value=""> -- Select --</option>
								<option value="male"<?php echo ($gender=="male")?"selected='selected'":"";?>>Male</option>
								<option value="female"<?php echo ($gender=="female")?"selected='selected'":"";?>>Female</option>
							</select>
						</div>
						
						<div class="col-6" style='margin-bottom: 2%'>
							<label for='designation'><b>Designation</b></label>
							<select name="designation" id="designation" class="form-control" required>
								<option value=""> -- Select --</option>
								<option value="medical team"<?php echo ($designation=="medical team")?"selected='selected'":"";?>>Medical Team (MT)</option>
								<option value="patient"<?php echo ($designation=="patient")?"selected='selected'":"";?>>Patient</option>
							</select>
						</div>
						
						<div class="col-6" style='margin-bottom: 2%'>
							<label for='department'><b>Department</b></label>
							<input type="text" name="department" id="department" value="<?php if(isset($department)) { echo $department; } ?>" class="form-control" placeholder="Enter department" required>
						</div>
						
						<div class="col-6" style='margin-bottom: 2%'>
							<label for='accntType'><b>Account Type</b></label>
							<select name="accntType" id="accntType" class="form-control" required>
								<option value=""> -- Select --</option>
								<option value="0"<?php echo ($accntType==0)?"selected='selected'":"";?>>Member</option>
								<option value="1"<?php echo ($accntType==1)?"selected='selected'":"";?>>Moderator</option>
								<option value="2"<?php echo ($accntType==2)?"selected='selected'":"";?>>Global Admin</option>
							</select>
						</div>
							
						<div class="col-12" style='margin-bottom: 2%'>
							<button class='btn btn-primary btn-lg btn-block' type='submit' name='editUser'><b>Modify User</b></button>
						</div>
					</div>
				</form>
				
		</div>
				
			
	</body>
</html>