<?php 
	$_SESSION["email"]= $email;
include_once("lib/header.php") ;
require_once("functions/alert.php");
require_once("functions/user.php");
	 
	if(!is_user_loggedIN() && !is_token_set()){
		$_SESSION["error"] = "you are not authorised to view that page";
			header("Location: login.php");
	}
			
	
?>
<style>
			<?php include 'css/side.css'; ?>
	</style>
	<div class="sidenav">
			<h4 class="container" style="border-bottom: 2px solid #f2f2f2; color:#818181;">Reset</h4>
			<a href="index.php">Home</a>
			
			
	</div>
	<div class="main">
			<h3>Reset Password</h3> 
			<p>Password associated with your email <?php echo $_SESSION["email"] ;?></p>
			<div class="container">
	
	
			<div class=" row col-8">
			<form action="processReset.php" method="POST">
				<p>
					<?php print_alert();?>
				</p>
				<p>
				<?php if(!is_user_loggedIN()){ ?>
					<input class="form-control"
						<?php
							if(is_token_set_in_session()){
								echo "value='". $_SESSION["token"]. "'";
							}else{
								echo "value='" . $_GET["token"]. "'";
							}
						?> type='hidden' name='token'  />
				<?php } ?>
				</p>
				<p>
					<label>Email</label><br />
					<input  class="form-control"
						<?php
							if(isset($_SESSION["email"])){
								echo "value=" . $_SESSION["email"];
							}
						?> 
						type="text" name="email" placeholder="Email"/>
				</p>
				<p>
					<label>Enter New Password</label><br />
					<input class="form-control" type="password" name="password" placeholder="password"/>
					
				</p>
				<p>
					<button class="btn btn-primary"type="submit">Reset PassWord</button>
				</p>
				</div>
				</div>
				</div>
				
			</form>
	<?php include_once("lib/footer.php") ;?>
			
	