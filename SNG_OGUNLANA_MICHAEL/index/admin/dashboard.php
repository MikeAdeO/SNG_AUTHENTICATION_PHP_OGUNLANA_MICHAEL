<?php
   session_start(); //starts the session
   require_once("../functions/alert.php");
   
	if($_SESSION['email']){ // checks if the user is logged in  
		$email = $_SESSION['email'];
		//Get content...
		$getcontent = file_get_contents("../db/users/".$email.".json");
		//Decode the content...
		$arrContent = json_decode($getcontent);
	} else{
		header("location: index.php"); // redirects if user is not logged in
	}
   
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css"/>

<html>
    <head>
        <title>Admin DashBoard</title>
    </head>
	
    <body>
        <h2 align="center">ADMIN DASHBOARD</h2>
        

		<hr>
		<div class="container">
			<div class="row">
				<?php if($arrContent->accntType  == 2) { ?>
					<div class="col-4">
						<div style="text-align:center; background:#fff; border: 1px solid #ccc; padding: 0px 10px; border-radius: 3px;box-shadow:0px 1px 0px 1px silver">
							<a href="adduser.php" style="color: #EB5424; text-decoration: none" title="Add User">
								<div style="padding:10px; font-size:28px">
									<i class="fa fa-user-plus fa-3x"></i>
									<br>
										Add User
								</div>
							</a>
						</div>
					</div>
				<?php } ?>
				<div class="col-4">
					<div style="text-align:center; background:#fff; border: 1px solid #ccc; padding: 0px 10px; border-radius: 3px;box-shadow:0px 1px 0px 1px silver">
						<a href="userlist.php" style="color: #EB5424; text-decoration: none" title="Manage User">
							<div style=" padding:10px; font-size:28px">
								<i class="fa fa-users fa-3x"></i>
								<br>
									Manage User
							</div>
						</a>
					</div>
				</div>
			
				<div class="col-4">
					<div style="text-align:center; background:#fff; border: 1px solid #ccc; padding: 0px 10px; border-radius: 3px;box-shadow:0px 1px 0px 1px silver">
						<a href="logout.php" style="color: #EB5424; text-decoration: none" title="Log Out">
							<div style=" padding:10px; font-size:28px">
								<i class="fa fa-sign-out fa-3x"></i>
								<br>
									Log Out (<?php echo ucfirst($arrContent->first_name);?>)
							</div>
						</a>
					</div>
				</div>
					
			</div>
		</div>
				
			
	</body>
</html>