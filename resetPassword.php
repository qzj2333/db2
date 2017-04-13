<?php
	include_once("db_connect.php");		
	
	// user filled info on resetPW page --> update pw
	$email    = $_GET ['op'];             // get email: email must exist (check before send email)
	$password = $_POST['inputPassword'];  
	$repeatPW = $_POST['repeatPassword']; 

	if ($password != $repeatPW)
	{	
		$url = "Location:http://cs.gettysburg.edu/~arpsja01/dbproj/database/enterPassword.php?op=" . $email . "&err=pwNM";

		// go back to resetPWPage with error message "pw does not match"
		Header($url);
	}
	else
	{
		$password = md5($password);
		// update pw in mysql data table
		$q = "UPDATE USER SET password = '" . $password . "' WHERE email = '" . $email . "';";
		$r = $db->query($q);

		if($r != FALSE )   // pw update successfully
		{
			// go back to main page with successfully message shown
			Header("Location:http://cs.gettysburg.edu/~wangli01/proj/main.php?err=success");
		}
	}

?>
