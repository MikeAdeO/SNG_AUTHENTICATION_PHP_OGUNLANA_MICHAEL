<?php
   session_start(); //starts the session
   require_once("../functions/alert.php");
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>

<html>
    <head>
        <title>Admin DashBoard</title>
    </head>
<?php
   if(isset($_SESSION['email'])){ // checks if the user is logged in  
   }
   else{
      header("location: log_admin.php"); // redirects if user is not logged in
   }
   $email = $_SESSION['email']; //assigns user value
  echo $email;
?>
    <body>
        <h2 align="center">ADMIN DASHBOARD</h2>
        
 
 <!--Display's user name-->
        <a href="logout.php">Click here to go logout</a><br/><br/>
        <!-- ==<form action="add.php" method="POST">
           Add more to list: <input type="text" name="details" /> <br/>
           Public post? <input type="checkbox" name="public[]" value="yes" /> <br/>
           <input type="submit" value="Add to list"/>
        </form>== -->
		<hr>
		<div class="container col- 7">
			
				
					
					<form method="POST" action="add_users.php">
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
						<p>
							<label>Department</label><br />
							<input <?php
									if(isset($_SESSION['department'])){
										echo "value=" . $_SESSION['department'];
									}
								?> type="text" class ="form-control" name="department" placeholder="Department"/>
						</p>
						<p>
							<button type="submit" class="btn btn-success" name="register">Register</button>
						</p>
				
					</form>

					
				</div>
				
			
	</body>
	</html>