<?php	
	// Validates a given type of form input
	// $type = type of form input
	// $value = the inputted value
	// &$errorMessage = array of error messages indexed on type
	function Validate($type, $value, &$errorMessage) {
		$value = trim($value);
		switch ($type) {
			case 'fname':
			case 'lname':
			case 'user_name':
			case 'text':

				if(!isset($value) || $value === "") {
					$errorMessage[$type] = "Required field. <br>";	
				}

			break; 
				
			case 'email':
			if(!preg_match('/^([a-z\d-_\.]+)@(([a-z\d-]+\.)+[a-z]{2,6})$/i', $value)) {
				$errorMessage[$type] = "This is not a valid email address.";
			}else{$exploded_email = explode("@",$value);$exploded_domain = explode(".",$exploded_email[1]);
				/* limit string length to 64 characters max*/
					if(strlen($exploded_email[0]) > 64 || strlen($exploded_email[1]) > 64 ){$errorMessage[$type] = 
					"This email address exceeds the character limit.";}
					else {foreach($exploded_domain as $value){if(strlen($value) > 63){$errorMessage[$type] = "This 					 
					email address exceeds the character limit.";} //close inner if
					}//close foreach
				}// if
			}//end else
			break;
	
							
			case 'password':
				if (!preg_match('/^.{8,13}$/', $value)) {
					$errorMessage[$type] = "Password must be 8 to 13 characters.<br />";
				}
				if (!preg_match('/\d+/', $value)) {
					$errorMessage[$type] .= "Password must contain at least 1 digit.<br />";
				}
				if (!preg_match('/[a-z]+/i', $value)) {
					$errorMessage[$type] .= "Password must contain at least 1 letter.<br />";
				}
				break;
				
			case 'passwordMatch':
				global $data;
				if ($value != $data['password']) {
					$errorMessage[$type] .= "Your passwords don't match.<br>";
				} 
				break;	
		}
	}

/* stores form input into session autoglobal as array */
function SaveSessionData($data){
		// we don't need password match, so we unset it:
		unset($data['passwordMatch']);
		$_SESSION['data'] = $data;
		echo "<p>saved:". print_r($_SESSION['data']) ."</p>";
		echo "<p>full contents of session variable: <br>". print_r($_SESSION) ."</p>";
}
function SendConfirmationEmail($data){

		$recipient = '$data';
		$subject = ' Profile Creation Confirmation';

		//generate random id to include in link, store it in session autoglobal:
		$_SESSION['conf'] = sha1 (rand().$recipient.time());
		$message = "Thank you for registering for an account.<br/>
		Please confirm your email address by clicking on the following link:<br/>
		<a href=\'http://safetycowboy.com/web-development/confirm.php?conf='".$_SESSION['conf']."
		'\">link</a>"
		;

		if(!mail($recipient, $subject, $message)) {
			print "mail failed.";
		}
		else {
			print "mail succeeded.";
		}
		
	}

?>