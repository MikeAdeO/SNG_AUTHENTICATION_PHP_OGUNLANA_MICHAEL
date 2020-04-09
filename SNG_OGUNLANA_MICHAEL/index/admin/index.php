<?php session_start(); 
require_once("../functions/alert.php");?>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
			<style>
				<?php include 'CSS/styles.css'; ?>
			</style>
	</head>
	<body>
	
		<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
			  <h5 class="my-0 mr-md-auto font-weight-normal"><a href="index.php">StartNG</a></h5>
			  <nav class="my-2 my-md-0 mr-md-3">
				
				<a class="p-2 text-dark" href="index.php">Login</a>|
				<a class="p-2 text-dark" href="../index.php">User Interface</a>|
				
			  </nav>
			
				 
			</div>
	
	<div class="container">
	<div class=" row col-8">
	<h3> Admin Login</h3>
	</div>
	
	<div class="col-8">
		<p>
			<?php print_alert();?>
		</p>
	</div>
	
	<div class="row col-8">
			<form action="adminLog.php" method="POST">
				
				<p>
					<label>Email</label><br />
					<input  class="form-control" type="email" name="email" placeholder="email"/>
					
				</p>
				<p>
					<label>Password</label><br />
					<input class="form-control" type="password" name="password" />
				</p>
				<p>
					<button class="btn btn-sm btn-primary" type="submit" name="submit">Login</button>
				</p>
				
			</form>
			</div>
			
			
	</body>
</html>