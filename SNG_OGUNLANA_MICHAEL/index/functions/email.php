<?php 
require_once("alert.php");
require_once("redirect.php");

	function send_email($subject = "", $message = "", $email = "" ){
		$headers = "from : no-reply@sng.org". "\r\n" . "CC: ogunlanaadepoju@gmail.com";
		
		$try = mail($email,$subject,$message,$headers);
						
			if($try){
				set_alert("message", "Password reset has been sent to your email".$email );
			
			redirect_to("login.php");	 
			}else{
				set_alert("error", "something went wrong, we could not send password reset to:".$email );
				
			redirect_to("forgotPassword.php");	
			}
	}
?>