<?php
$host = "ada.cc.gettysburg.edu";
$dbase = "akw_s17";
$user = "wangli01";
$pass = "wangli01";
try
{
	$db = new PDO("mysql:host=$host;dbname=$dbase",
			$user,
			$pass);
}
catch(PDOException $e)
{
	die("Error connecting to MySQL server:".
		$e->getMessage());
}
?>
