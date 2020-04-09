<?php   include_once("lib/header.php") ;
		require_once("functions/alert.php");
		if(isset($_SESSION["loggedIN"]) && !empty($_SESSION["loggedIN"])){
		//redirect to dashboard
		header("Location: dashboard.php");
	}
	?>
	<div class="container">
	<div class=" row col-8">
		<h3>Login</h3>
	</div>
	<div class="col-8">
		<p>
			<?php print_alert();?>
		</p>
	</div>
	<div class="row col-8">
			<form action="processlogin.php" method="POST">
				
				<p>
					<label>Email</label><br />
					<input 
						<?php
							if(isset($_SESSION["email"])){
								echo "value= " . $_SESSION["email"];
							}
						?> class="form-control" type="email" name="email" placeholder="email"/>
					
				</p>
				<p>
					<label>Password</label><br />
					<input class="form-control" type="password" name="password" />
				</p>
				<p>
					<button class="btn btn-sm btn-primary" type="submit" name="login">Login</button>
				</p>
				<p>
					<a href="forgotPassword.php">Forgot Password</a><br />
					<a href="register.php">You don't have an account? Register</a>
				</p>
			</form>
			</div>
			</div>
<?php include_once("lib/footer.php") ;?>
			
	