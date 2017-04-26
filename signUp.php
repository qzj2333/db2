<?php
	include_once("db_connect.php");
	$url = explode("/", $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); 
	// get info from user
	$email    = $_POST['inputEmail'];
	$password = $_POST['inputPassword'];
	$repeatPW = $_POST['repeatPassword'];
		
	// check if email already exists in the data
	$q = "SELECT * FROM USER WHERE email = '" . $email . "';";
	$r = $db->query($q);
	print($q);
	if($r->rowCount() != 0)   // email already exist
	{
		// go back to login page
		$link = $url[0]."/".$url[1]."/".$url[2]."/signUpPage.php?err=emailExist";
		Header("Location:http://".$link);  
	}
	else if($password != $repeatPW)   // pw != repeatPW
	{
		$link = $url[0]."/".$url[1]."/".$url[2]."/signUpPage.php?err=pwNM";
		Header("Location:http://".$link); 
	}
	else  // create account
	{
		$md5password = md5($password);
		// insert into mysql data table: email, password, fname, lname, mname
		$q = "INSERT INTO USER VALUES ( '" . $email . "', '" . $md5password . "', NULL, NULL, NULL);";
		$r = $db->query($q);
		if($r != FALSE)   // account created successfully
		{
			session_start();
			$_SESSION["email"] = $email;
			$_SESSION["pw"]    = $password;
			$link = $url[0]."/".$url[1]."/".$url[2]."/home.php";
			Header("Location:http://".$link);   // go to user account page
		}
	}
		
?>
