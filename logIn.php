<?php
	include_once("db_connect.php");	
	$url = explode("/", $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); 
	session_start();

	$email       = $_POST['inputEmail'];
	$password    = $_POST['inputPassword'];
	$md5password = md5($password);
	// get pw in data table
	$q = "SELECT password FROM USER WHERE email = '" . $email . "';";
	$r = $db->query($q);   // password of that username
		
	if( $r->rowCount() == 0 )   // email DNE
	{
		$link = $url[0]."/".$url[1]."/".$url[2]."/main.php?err=emailDNE";
		Header("Location:http://".$link); 
	}
		
		
 	else {
		$row = $r->fetch();   // get the table value

		if( $row['password'] != $md5password )   // password wrong
		{
			$link = $url[0]."/".$url[1]."/".$url[2]."/main.php?err=wrongPW";
			Header("Location:http://".$link); 
		}
		else   // username & password matches
		{				
			$_SESSION["email"] = $email;
			$_SESSION["pw"]    = $password;
			
			$link = $url[0]."/".$url[1]."/".$url[2]."/home.php";
			Header("Location:http://".$link);   // go to user account page
		} 
	}
?>
