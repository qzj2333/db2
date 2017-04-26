<?php
	include_once("db_connect.php");	
	$url = explode("/", $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);	
	
	// user filled info on resetPW page --> update pw
	$email    = $_GET ['op'];             // get email: email must exist (check before send email)
	$password = $_POST['inputPassword'];  
	$repeatPW = $_POST['repeatPassword']; 

	if ($password != $repeatPW)
	{	
		$link = $url[0]."/".$url[1]."/".$url[2]."/enterPassword.php?op=" . $email . "&err=pwNM";
		Header("Location:http://".$link);
	}
	else
	{
		$password = md5($password);
		// update pw in mysql data table
		$q = "UPDATE USER SET password = '" . $password . "' WHERE email = '" . $email . "';";
		$r = $db->query($q);

		if($r != FALSE )   // pw update successfully
		{
			$link = $url[0]."/".$url[1]."/".$url[2]."/main.php?err=success";
			Header("Location:http://".$link);
		}
	}

?>
