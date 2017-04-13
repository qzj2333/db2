<?php
	include_once("db_connect.php");	
	
	// get info from user
	$email = $_POST['inputEmail'];     // inputEmail may change
	// check if email exist:
	$q = "SELECT email FROM USER WHERE email = '" . $email . "';";
	$r = $db->query($q);
	if($r->rowCount() != 0 )   // email not exist
	{
		// send email to user: call mail function
		$result = mail($email, 'Reset password from Fridge Manager ',         // Title 
		                       'Hello, please reset password of this email by clicking the following link: http://cs.gettysburg.edu/~wangli01/proj/enterPassword.php?op='. $email,  // content (paragraph inside email)
		// above: resetPW link, needed to be able to click
				       'From: ' . 'Admin@fridgeManager'); 
	
		// give user message
		Header("Location:http://cs.gettysburg.edu/~arpsja01/dbproj/database/forgotPWPage.php?op=message");
	}		
	else
	{
		// give user message
		Header("Location:http://cs.gettysburg.edu/~arpsja01/dbproj/database/forgotPWPage.php?op=emailDNE");
	}
?>
