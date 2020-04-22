<?php
   session_start(); //starts the session
   require_once("../functions/alert.php");
   
	if($_SESSION['email']){ // checks if the user is logged in  
		$email = $_SESSION['email'];
		//Get content...
		$getcontent = file_get_contents("../db/users/".$email.".json");
		//Decode the content...
		$arrContent = json_decode($getcontent);
		if($arrContent->accntType != 2) {
			header("location: index.php"); // user is not an admin...
		}
	} else{
		header("location: index.php"); // redirects if user is not logged in
	}
	
date_default_timezone_set("Africa/Lagos");  #use  this to set normal time....
   
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css"/>

<html>
    <head>
        <title>Add User</title>
    </head>
	
    <body>
        <h2 align="center">ADMIN DASHBOARD</h2>
        

		<hr>
		<div class="container">
				
				<div class="col-12" style='margin-bottom: 2%'>
					<font size='4px'><b><a href="dashboard.php" style='text-decoration: none'>Dashboard</a>  &raquo; Add User</b></font><br>
					<font color='red'><b>Note: </b></font> All account created by admin are created with a default password of <b>12345</b>
				</div>
				
				<?php 
				$gender = ''; $designation = ''; $accntType = '';
				if(isset($_POST["addUser"])) {
					$first_name = $_POST["first_name"];
					$last_name = $_POST["last_name"];
					$emailaddr = strtolower($_POST["emailaddr"]);
					$gender = strtolower($_POST["gender"]);
					$designation = strtolower($_POST["designation"]);
					$department = ucfirst($_POST["department"]);
					$accntType = strtolower($_POST["accntType"]);
					$password = 12345;
					
					//We need to open the location of where files are been stored to...
					$allUsers = scandir("../db/users/");
					$countAllUsers = count($allUsers);
					
					
					$userObject = [
						"id" => 1,
						"first_name" => $first_name,
						"last_name" => $last_name,
						"email" => $emailaddr,
						"password" => password_hash($password, PASSWORD_DEFAULT),
						"gender" => $gender,
						"designation" => $designation,
						"accntType" => $accntType,
						"department" => $department,
						"date_reg" => date("D j F, Y; h:i a"),
						"loggedtime" => '' //Empty for login record..
					]; 
					
					$exist = 0; //exist counter...
					
					//Check if user exist
					for($counter = 0; $counter < $countAllUsers; $counter++){
						$currentUser = $allUsers[$counter];
						
						if($currentUser == $emailaddr . ".json"){
							$_SESSION["error"] = "Registration failed, user already exist";
							$exist++;
						}
						
					}
					
					if($exist == 0) {
						if(file_put_contents("../db/users/".$emailaddr . ".json",json_encode($userObject))) { // user added...
							echo "<div class='alert alert-success'>User created successfully</div>";
							
							//We need to remove input values since registration as successful..
							unset($first_name); unset($last_name); unset($emailaddr);
							unset($gender); unset($designation); unset($department); unset($accntType);
						} else {
							$_SESSION["error"] = "Registration failed, please retry";
						}
					}
					
					if(!empty($_SESSION["error"])) { print_alert(); }
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
							<input type="text" name="emailaddr" id="emailaddr" value="<?php if(isset($emailaddr)) { echo $emailaddr; } ?>" class="form-control" placeholder="Enter last name" required>
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
							<label for='designation'><b>Department</b></label>
							<select name="department" id="department" class="form-control" required>
								<option value=""> -- Select --</option>
								<option value="Antenatal">Antenatal</option>
								<option value="Dental">Dental</option>
								<option value="Pharmacy">Pharmacy</option>
								<option value="Physiotherapy">Physiotherapy</option>
								<option value="Pediatrics">Pediatrics</option>
								<option value="Accidents & Emergency">Accidents & Emergency</option>
								<option value="General care">General care</option>
								
							</select>
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
							<button class='btn btn-primary btn-lg btn-block' type='submit' name='addUser'><b>Add User</b></button>
						</div>
					</div>
				</form>
				
		</div>
				
			
	</body>
</html>