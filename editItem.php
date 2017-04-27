<?php
	include_once("db_connect.php");	
	session_start();
	$url = explode("/", $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

	$amount = $_POST['newAmount'];
	
	if ( ! ctype_digit ($amount) )   // if $amount is not a integer
	{
		$link = $url[0]."/".$url[1]."/".$url[2]."/fridgeInfo.php?id=". $_SESSION['fid']."&op=". $_SESSION['nname']."&meg=fail";
		Header("Location:http://".$link);
	}

	else
	{
		if ( $amount <= 0 )
		{
			// get infoID for future check
			$q4 = "SELECT infoID FROM ITEM WHERE iid =" .$_GET['op'].";";
			$r4 = $db->query($q4);
			$v = $r4->fetch();
			$infoID = $v['infoID'];
				
			// delete item
			$q1 = "DELETE FROM ITEM WHERE iid = ".$_GET['op'].";";
			$r1 = $db->query($q1);
			
			//  delete I_U
			$q2 = "DELETE FROM I_U WHERE iid =" .$_GET['op'].";";
			$r2 = $db->query($q2);

			//  delete F_I	
			$q3 = "DELETE FROM F_I WHERE iid =" .$_GET['op'].";";
			$r3 = $db->query($q3);

			// check ITEM_INFO
			$q5 = "SELECT iid FROM ITEM WHERE infoID=" .$infoID.";";
			$r5 = $db->query($q5);
			if( $r5 == FALSE )
			{
				$link = $url[0]."/".$url[1]."/".$url[2]."/fridgeInfo.php?id=". $_SESSION['fid']."&op=". $_SESSION['nname']."&meg=fail";
				Header("Location:http://".$link); 
				return;
			}
			elseif( $r5->rowCount() == 0 )
			{
				$q6 = "DELETE FROM ITEM_INFO WHERE infoID =" .$infoID.";";
				$r6 = $db->query($q6); 

				if($r6 == FALSE)
				{
					$link = $url[0]."/".$url[1]."/".$url[2]."/fridgeInfo.php?id=". $_SESSION['fid']."&op=". $_SESSION['nname']."&meg=fail";
					Header("Location:http://".$link); 
					return;
				}
			} 

			if( ($r1 != FALSE) && ($r2 != FALSE) && ($r3 != FALSE) )
			{
				$link = $url[0]."/".$url[1]."/".$url[2]."/fridgeInfo.php?id=". $_SESSION['fid']."&op=". $_SESSION['nname']."&meg=success";
				Header("Location:http://".$link);
			}
			else
			{
				$link = $url[0]."/".$url[1]."/".$url[2]."/fridgeInfo.php?id=". $_SESSION['fid']."&op=". $_SESSION['nname']."&meg=fail";
				Header("Location:http://".$link); 
				return;
			}
		}

		else
		{
			// update amount
			$q = "UPDATE ITEM SET amount = '". $amount . "' WHERE iid = ".$_GET['op'].";";
			$r = $db->query($q); 

			if( $r != FALSE )
			{
				$link = $url[0]."/".$url[1]."/".$url[2]."/fridgeInfo.php?id=". $_SESSION['fid']."&op=". $_SESSION['nname']."&meg=success";
				Header("Location:http://".$link); 
			}
			else
			{
				$link = $url[0]."/".$url[1]."/".$url[2]."/fridgeInfo.php?id=". $_SESSION['fid']."&op=". $_SESSION['nname']."&meg=fail";
				Header("Location:http://".$link);
			}
		}	
	}
?>
