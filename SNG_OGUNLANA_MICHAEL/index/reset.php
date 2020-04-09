<?php 
	
include_once("lib/header.php") ;
require_once("functions/alert.php");
require_once("functions/user.php");
	 
	if(!is_user_loggedIN() && !is_token_set()){
		$_SESSION["error"] = "you are not authorised to view that page";
			header("Location: login.php");
	}
			
	
?>
			<h3>Reset Password</h3> 
			<p>Password associated with your email <?php echo $email ;?></p>
			<form action="processReset.php" method="POST">
				<p>
					<?php print_alert();?>
				</p>
				<p>
				<?php if(!is_user_loggedIN()){ ?>
					<input
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
					<input 
						<?php
							if(isset($_SESSION["email"])){
								echo "value=" . $_SESSION["email"];
							}
						?> 
						type="text" name="email" placeholder="Email"/>
				</p>
				<p>
					<label>Enter New Password</label><br />
					<input type="password" name="password" placeholder="password"/>
					
				</p>
				<p>
					<button type="submit">Reset PassWord</button>
				</p>
				
			</form>
	<?php include_once("lib/footer.php") ;?>
			
	