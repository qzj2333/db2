<?php
	include_once("db_connect.php");	
	$url = explode("/", $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

	// get info from user
	$email = $_POST['inputEmail']; 
	// check if email exist:
	$q = "SELECT email FROM USER WHERE email = '" . $email . "';";
	$r = $db->query($q);
	if($r->rowCount() != 0 )   // email exist
	{
		$link = $url[0]."/".$url[1]."/".$url[2]."/forgotPWPage.php?op=".$email;

		// send email to user: call mail function
		$result = mail($email, 'Reset password from Fridge Manager ',         // Title 
		                       'Hello, please reset password of this email by clicking the following link: http://'.$link,  // content (paragraph inside email)
				       'From: ' . 'Admin@fridgeManager'); 
	
		// give user message

		$link = $url[0]."/".$url[1]."/".$url[2]."/forgotPWPage.php?op=message";
		Header("Location:http://".$link); 
	}		
	else
	{
		// give user message
		$link = $url[0]."/".$url[1]."/".$url[2]."/forgotPWPage.php?op=emailDNE";
		Header("Location:http://".$link); 
	}
?>
