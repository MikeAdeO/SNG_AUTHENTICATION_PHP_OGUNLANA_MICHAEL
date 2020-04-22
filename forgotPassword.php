<?php include_once("lib/header.php") ;
		require_once("functions/alert.php");
			
	if(!isset($_SESSION["loggedIN"])){
		//redirect to homepage
		header("Location: login.php");
	}
?>
			<div class=" container col-8">
			<h3>Forgot Password</h3>
			<p>Provide the email address associated with your account</p>
			<form action="processForgot.php" method="POST">
				<p>
					<?php print_alert(); ?>
				</p>
				<p>
					<label>Email</label><br />
					<input class="form-control" <?php 
						if(isset($_SESSION["email"])){
							echo "value=" . $_SESSION["email"];
						}
					?>  type="text" name="email" placeholder="Email"/>
				</p>
				<p>
					<button class="btn btn-primary" type="submit">Send Reset Code</button>
				</p>
				
			</form>
			</div>
	<?php include_once("lib/footer.php") ;?>
			
	