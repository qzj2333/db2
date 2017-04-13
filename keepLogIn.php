// If check remember me, connect to this
<?php
	include_once("db_connect.php");
	// start session so that _SESSION variable can be created
	session_start();
	// remember email & pw
	$_SESSION["email"] = $email;
	$_SESSION["pw"] = $_POST['inputPassword'];   // $password already encode
?>
