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
	
date_default_timezone_set("Africa/Lagos");  #use  this to set normal time....
   
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css"/>

<html>
    <head>
        <title>Medical Team</title>
    </head>
	
    <body>
        <h2 align="center">ADMIN DASHBOARD</h2>
        

		<hr>
		<div class="container">
				
			<div class="col-12" style='margin-bottom: 2%'>
				<font size='4px'><b><a href="dashboard.php" style='text-decoration: none'>Dashboard</a>  &raquo; Medical Team List</b></font><br>
			</div>
			
			<div class="col-12" style='margin-bottom: 2%'>
				<?php
				if(isset($_REQUEST["deleteEmail"])) {
					$deleteEmail = base64_decode($_REQUEST["deleteEmail"]); //Decode the server...
					if(unlink("../db/users/".$deleteEmail.".json")) {
						echo "<div class='alert alert-success'><b>User deleted successfully</b></div>";
					} else {
						echo "<div class='alert alert-danger'><b>Error deleting User</b></div>";
					}
				}
				?>
			</div>
			
			<div class="col-12" style='margin-bottom: 2%'>
				<div class="table-responsive">
					<table class="table table-striped  table-bordered table-hover">
						<tr>
							<th>S/N</th>
							<th>Name</th>
							<th>Email</th>
							<th>Department</th>
							<th></th>
						</tr>
						<tr>
						<?php
							$start_count = 1;
							$allUser = scandir("../db/users/");
							$countAllUsers = count($allUser);
							for($counter = 0; $counter < $countAllUsers; $counter++) {
								$currentUser = $allUser[$counter]; 
								if(strlen($currentUser) > 5) { //To remove invalid account...
									//Open json file...
									$getFile = file_get_contents("../db/users/".$currentUser);
									$decodeResp = json_decode($getFile);
									if(strtolower($decodeResp->designation) == "medical team") { ?>
								
										<td><?php echo $start_count++;?></td>
										<td><?php echo $decodeResp->first_name." ".$decodeResp->last_name;?></td>
										<td><?php echo $decodeResp->email;?></td>
										<td><?php echo $decodeResp->department;?></td>
										<td>
											<a href="edit-user.php?editEmail=<?php echo base64_encode($decodeResp->email);?>" class="btn btn-primary btn-sm" style="margin: 10px">
												<b><i class="fa fa-pencil"></i> Edit</b>
											</a>
											<a href="?deleteEmail=<?php echo base64_encode($decodeResp->email);?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete User')" style="margin: 10px">
												<b><i class="fa fa-trash"></i> Delete</b>
											</a>
										</td>
							</tr>
							<?php	}
							}
						} ?>
					</table>
				
				</div>
			</div>
			
		</div>
				
			
	</body>
</html>