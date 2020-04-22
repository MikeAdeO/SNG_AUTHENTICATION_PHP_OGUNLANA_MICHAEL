<?php 
	function print_error(){
		if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
			echo "<span style='color: red'>" . $_SESSION["error"] . "</span>";
			unset($_SESSION['error']);
		}
	}
	
	function print_alert(){
		//for printing message or error
		$types = [ "message", "info", "error"];
		$color = ["success", "info", "danger"];
		for($i = 0; $i < count($types); $i++){
			
			if(isset($_SESSION[$types[$i]]) && !empty($_SESSION[$types[$i]])){
				echo "<div class='alert alert-".$color[$i]."' role='alert'>". $_SESSION[$types[$i]].
					"</div>";
				
				unset($_SESSION[$types[$i]]);
			}
		}
		
	}
	
	function print_message(){
		if(isset($_SESSION["message"]) && !empty($_SESSION["message"])){
			echo "<span style='color: green'>" . $_SESSION["message"] . "</span>";
			unset($_SESSION['message']);
		}
	}
	
	function set_alert($type = "message", $content= ""){
		switch($type){
			case "message":
			$_SESSION["message"]= $content;
			break;
			
			case "error" :
			$_SESSION["error"] = $content;
			break;
			
			case "info" :
			$_SESSION["info"] = $content;
			break;
			
			default:
			$_SESSION["mesage"] = $content;
			break;
			unset($_SESSION['message']);
		}
	}
	
	function appointment(){
		
	}
?>