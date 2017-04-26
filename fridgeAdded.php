<?php
	session_start();
	include_once("db_connect.php");
	$url = explode("/", $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); 
	$email = $_SESSION["email"];

	print_r($_POST);
	
	//get number of fridges, make new fridge id
	$query  = "SELECT fid FROM FRIDGE;";
	$result = $db->query($query);
	$fid    = $result->rowCount() + 1;
	
	$name  = $_POST['name'];
	$price = $_POST['price'];
	$brand = $_POST['brand'];
	$date  = $_POST['date'];
	$warranty  = $_POST['warranty'];
	
	
	//image info
	$filedata = $_FILES['fridgePic'];
	
	$userfn    = $filedata['name'];
	$size 	   = $filedata['size'];
	$type 	   = $filedata['type'];
	$serverfn  = $filedata['tmp_name'];
	$ext = end((explode(".", $userfn)));
	print("<br />" . $userfn . "<br />" . $size . "<br />" . $type . "<br />" . $serverfn . "<br />" . $ext . "<br />");
	$realdata = $filedata['tmp_name'];
	$imginfo = getimagesize($realdata);
	$mimetype = $imginfo['mime'];
	
	//make sure file is an image
	if($imginfo == FALSE){
		$msg = "File is not an image";
		echo $msg;
		//header back to addFridge page
		
	} elseif(
		//make sure image is correct filetype
		$mimetype != "image/jpeg" &&
		$mimetype != "image/jpg" &&
		$mimetype != "image/gif" &&
		$mimetype != "image/png" ){
	
		$msg = "File type not allowed";
		echo $msg;
		//header back to addFridge page
		
	} else{
		$folder = './fridges/';
		$fn = $folder .'f'. $fid . "." . $ext;
		//$fn = $fid . "." . $ext;
		move_uploaded_file($realdata, "$fn");
		
		echo($fn);
		
		//$date is not working when adding to database (always gives 0000-00-00)
		$query1 = "INSERT INTO FRIDGE VALUES(" . $fid . ", '" . $name . "' , '" . $ext . "' , " . $price . " , '" . $brand . "'
										  , '" . $date . "' , " . $warranty . ");";
		$query2 = "INSERT INTO F_U VALUES(" . $fid . ", '" . $email . "');";
		
		$result1 = $db->query($query1);
		$result2 = $db->query($query2);
		
		if ($result1 != FALSE && $result2 != FALSE) {
			$link = $url[0]."/".$url[1]."/".$url[2]."/main.php";
			Header("Location:http://".$link); 
		}
	}

?>
