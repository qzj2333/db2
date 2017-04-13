<?php
	include_once("db_connect.php");
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
		Header("Location: http://cs.gettysburg.edu/~arpsja01/dbproj/database/signUpPage.php?err=emailExist");
	}
	else if($password != $repeatPW)   // pw != repeatPW
	{
		Header("Location: http://cs.gettysburg.edu/~arpsja01/dbproj/database/signUpPage.php?err=pwNM");
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
			Header("Location:http://cs.gettysburg.edu/~wangli01/proj/home.php");   // go to user account page
		}
	}
		
?>
