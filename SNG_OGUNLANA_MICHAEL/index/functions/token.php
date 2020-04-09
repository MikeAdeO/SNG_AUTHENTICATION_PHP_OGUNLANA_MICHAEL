<?php
	function generate_token(){
		$token = "";
					
		$alphabet = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u","v", 
					"w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S",
					"T", "U", "V", "W", "X", "Y", "Z"];
				for($i = 0; $i < 30; $i++){
					$index= mt_rand(0, count($alphabet)-1);
					$token .= $alphabet[$index];
				}
	}
	
	function find_token($email = ""){
		$allUserTokens = scandir("db/tokens/");
			$countAllUserTokens = count($allUserTokens);
			
			
			for($counter = 0; $counter < $countAllUserTokens; $counter++){
				$currentTokenFile = $allUserTokens[$counter];
				if($currentTokenFile == $email. ".json"){
					$tokenContent = file_get_contents("db/tokens/".$currentTokenFile);
					$tokenObject = json_decode($tokenContent);
					//$tokenFromDB = $tokenObject -> token;
					
					return $tokenObject;
					
					
					}
				}
					return false;
					

	}
	
	
?>