<?php
	include_once("db_connect.php");	
	$url = explode("/", $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); 
	session_start();

	$name     = $_POST['rb'];
	$location = $_POST['location'];
	$price    = $_POST['price'];
	$amount   = $_POST['amount'];
	$pb       = $_POST['place_bought'];
	$dp       = $_POST['D_purchased'];
	$de       = $_POST['D_exp'];

	// check if all data have right type
	$date1 = explode("-", $dp);
	$date2 = explode("-", $de);
	
	if(! checkdate($date1[1], $date1[2], $date1[0]) || ! checkdate($date2[1], $date2[2], $date2[0]) || ! ctype_digit ($amount) || ! is_numeric($price) )
	{
		$link = $url[0]."/".$url[1]."/".$url[2]."/addItemPage.php?&meg=FAIL";
		Header("Location:http://".$link);
	}
	else
	{
		if ( isset( $name ) )    // $name exit in itemInfo
		{          
			// get infoID
			$q   = "SELECT infoID FROM ITEM_INFO WHERE NAME = '".$name."';";
			$r   = $db->query($q);
			$row = $r->fetch();
			$infoID = $row['infoID'];	     
		}
		else   // need create new itemInfo
		{
			$name = $_POST['name'];
			$type = $_POST['type'];
			$desc = $_POST['desc'];

// ************* image part can not work
			//image
/*			$filedata = $_FILES['itemPict'];
	
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
			if($imginfo == FALSE)
			{
				$msg = "File is not an image";
				$link = $url[0]."/".$url[1]."/".$url[2]."/addItemPage.php?&meg=".$msg";
				Header("Location:http://".$link);
			} 
			elseif
			{
				//make sure image is correct filetype
				$mimetype != "image/jpeg" &&
				$mimetype != "image/jpg" &&
				$mimetype != "image/gif" &&
				$mimetype != "image/png" ){
	
				$msg = "File type not allowed";
				$link = $url[0]."/".$url[1]."/".$url[2]."/addItemPage.php?&meg=".$msg";
				Header("Location:http://".$link);
			} 
			else
			{
				// $folder = "path to wangli01 images folder";
				// $fn = $folder . $fid . "." . $ext;
				$fn = $fid . "." . $ext;
				move_uploaded_file($realdata, $fn);
*/
// need change png to $ext after fix image part code
				// add data in ITEM_INFO
				$q = "INSERT INTO ITEM_INFO VALUES (".$infoID.", '".$name."', '".$type."', '".$desc."', 'PNG');";   
				$r = $db->query($q);

				if( $r == FALSE )
				{
					$link = $url[0]."/".$url[1]."/".$url[2]."/addItemPage.php?&meg=FAIL";
					Header("Location:http://".$link);
				}
				
//			}	
		} 

		// add data in ITEM
		$q = "INSERT INTO ITEM(location, price, amount, place_bought, D_Purchased, D_exp, infoID) VALUES ('".$location."', ".$price.", ".$amount.", '".$pb."', '".$dp."', '".$de."', ".$infoID. ");";
		$r1 = $db->query($q);

		// get iid
		$q = "SELECT MAX(iid) FROM ITEM;";
		$r2 = $db->query($q);
		print_r($r2);
		if( ($r1 != FALSE) && ($r2 != FALSE) )
		{
			$v = $r2->fetch();
			$iid = $v['MAX(iid)'];

			//  update I_U

			$q = "INSERT INTO I_U VALUES (".$iid.", '".$_SESSION['email']."');";
			$r3 = $db->query($q);

			//  update F_I	
			$q = "INSERT INTO F_I VALUES (".$_SESSION['fid'].", ".$iid.");";
			$r4 = $db->query($q);

			if ( ($r3 != FALSE) && ($r4 != FALSE) )
			{
				$link = $url[0]."/".$url[1]."/".$url[2]."/fridgeInfo.php?id=". $_SESSION['fid']."&op=". $_SESSION['nname']."&meg=SUCCESS";
				Header("Location:http://".$link); 
			}	
		}

		

		else
		{
			Header("Location: http://cs.gettysburg.edu/~wangli01/proj/addItemPage.php?&meg=FAIL");
		}
	}
?>
