<?php
	include_once("lib/header.php") ;
	require_once("functions/alert.php");
	if(isset($_SESSION["loggedIN"]) && !empty($_SESSION["loggedIN"])){
		//redirect to dashboard
		header("Location: dashboard.php");
	}
	// $_SESSION['TESTING'] = "testing session";
	// print_r($_SESSION);
 ?>
	<div class="container">
	
	
			<div class=" row col-8">
			<p><strong>Welcome, please Register</strong></p>
			</div>
			<div class=" row col-8">
			<h3>Register Here</h3>
			</div>
			<div class=" row col-8">
			<p>All Fields are required </p>
				</div>
			<div class="row col-8">
			<form method="POST" action="processregister.php">
				<p>
					<?php
						print_alert();
					?>
				</p>
				
				<p>
					<label>First Name</label><br />
					<input 
						<?php
							if(isset($_SESSION['first_name'])){
								echo "value=" . $_SESSION['first_name'];
								
							}
						?> type="text" class ="form-control" name="first_name" placeholder="First Name"/>
					
				</p>
				<p>
					<label>Last Name</label><br />
					<input 
						<?php
							if(isset($_SESSION['last_name'])){
								echo "value=" . $_SESSION['last_name'];
							}
						?> type="text" class ="form-control" name="last_name" placeholder="last Name"/>
					
				</p>
				<p>
					<label>E-Mail</label><br />
					<input 
						<?php
							if(isset($_SESSION['email'])){
								echo "value=" . $_SESSION['email'];
							}
						?> class ="form-control" type="email" name="email" placeholder="Enter your email"/>
					
				</p>
				<p>
					<label>Password</label><br />
					<input type="password" name="password" class ="form-control" placeholder="password"/>
					
				</p>
				<p>
					<label>Gender</label><br />
					<select name="gender" class ="form-control">
						<option 
							<?php
								if(isset($_SESSION['gender']) && $_SESSION['gender']=='female'){
								echo "Selected";
							}
						?> 
						value="female">Female</option>
						<option
								<?php
								if(isset($_SESSION['gender']) && $_SESSION['gender']=='male'){
								echo "Selected";
							}
						?> value="male">Male</option>
					</select>
				</p>
				<hr />
				<p>
					<label>Designation</label><br />
					<select name="designation" class ="form-control">
						<option 
							<?php
								if(isset($_SESSION['designation']) && $_SESSION['designation']=='Medical Team (MT)'){
								echo "Selected";
							}
						?> 
						value="medical Team">Medical Team(MT)</option>
						<option 
							<?php
								if(isset($_SESSION['designation']) && $_SESSION['designation']=='patient'){
								echo "Selected";
							}
						?> value="patient">Patient</option>
					</select>
				</p>
				
				<!---start--->
					<p>
					<label>Department</label><br />
						<select name="department" class="form-control">
							<option value="">Select One</option>
							<option <?php
								if(isset($_SESSION['department']) && $_SESSION['department']=='Antenatal'){
								echo "Selected";
							}
								?>  value="Antenatal">Antenatal</option>
							<option  <?php
								if(isset($_SESSION['department']) && $_SESSION['department']=='Dental'){
								echo "Selected";
							}
								?> value="Dental">Dental</option>
							<option  <?php
								if(isset($_SESSION['department']) && $_SESSION['department']=='Pharmacy'){
								echo "Selected";
							}
								?>  value="Pharmacy">Pharmacy</option>
							<option  <?php
								if(isset($_SESSION['department']) && $_SESSION['department']=='Physiotherapy'){
								echo "Selected";
							}
								?> value="PhysioTherapy">Physiotherapy</option>
							<option  <?php
								if(isset($_SESSION['department']) && $_SESSION['department']=='Pediatrics'){
								echo "Selected";
							}
								?>  value="Pediatrics">Pediatrics</option>
							<option  <?php
								if(isset($_SESSION['department']) && $_SESSION['department']=='Accidents & Emergency'){
								echo "Selected";
							}
								?> value="Accidents & Emergency">Accidents & Emergency</option>
							<option  <?php
								if(isset($_SESSION['department']) && $_SESSION['department']=='General care'){
								echo "Selected";
							}
								?> value="General care">General Care</option>
						</select>
					
				</p>
				<!---end--->
				
				
				<p>
					<button type="submit" class="btn btn-success" name="register">Register</button>
				</p>
				<p>
					<a href="forgotPassword.php">Forgot Password</a><br />
					<a href="login.php">Already have an account? Login</a>
				</p>
			</form>
	</div>
	</div>
<?php include_once("lib/footer.php") ;?>
			
	