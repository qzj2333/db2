<?php
	session_start();
	include_once("db_connect.php");

	$url = explode("/", $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); 
	$email = $_SESSION["email"];

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
//	print("<br />" . $userfn . "<br />" . $size . "<br />" . $type . "<br />" . $serverfn . "<br />" . $ext . "<br />");
	$realdata = $filedata['tmp_name'];
	$imginfo = getimagesize($realdata);
	$mimetype = $imginfo['mime'];
	
	//make sure file is an image
	if($imginfo == FALSE){
		$msg = "File is not an image";

		$link = $url[0]."/".$url[1]."/".$url[2]."/home.php?msg=".$msg;
		Header("Location:http://".$link); 
		
	} elseif(
		//make sure image is correct filetype
		$mimetype != "image/jpeg" &&
		$mimetype != "image/jpg" &&
		$mimetype != "image/gif" &&
		$mimetype != "image/png" ){
	
		$msg = "File type not allowed";
		$link = $url[0]."/".$url[1]."/".$url[2]."/home.php?msg=".$msg;
		Header("Location:http://".$link);
		
	} else{
		$query1 = "INSERT INTO FRIDGE(nname, PICTURE, price, brand, D_buy, warranty_period) VALUES('" . $name . "' , '" . $ext . "' , " . $price . " , '" . $brand . "', '" . $date . "' , " . $warranty . ");";
		$result1 = $db->query($query1);
		$query2 = "SELECT MAX(fid) FROM FRIDGE;";
		$result2 = $db->query($query2);

		if( ($result1 != FALSE) && ($result2 != FALSE) )
		{
			$v = $result2->fetch();
			$fid = $v['MAX(fid)'];
			$query3 = "INSERT INTO F_U VALUES(" . $fid . ", '" . $email . "');";		
			$result3 = $db->query($query3);
		
			if ($result3 != FALSE) 
			{
				$folder = './fridges/';
				$fn = $folder .'f'. $fid . "." . $ext;
				//$fn = $fid . "." . $ext;
				move_uploaded_file($realdata, "$fn");
				$link = $url[0]."/".$url[1]."/".$url[2]."/home.php";
				Header("Location:http://".$link); 
			}
		}
	}

?>
