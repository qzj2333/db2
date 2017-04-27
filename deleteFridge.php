<?php
	session_start(); 
	include_once("db_connect.php");	
	$url = explode("/", $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); 

	$fid = $_GET['op'];
	$q = "SELECT nname FROM FRIDGE WHERE fid=".$fid.";";  
	$r = $db->query($q);
	if ($r == FALSE)
	{
		$link = $url[0]."/".$url[1]."/".$url[2]."/home.php?msg=DNE";
		Header("Location:http://".$link);
	}
	else
	{

		$v = $r->fetch();
		$name = $v['nname'];

		$q = "DELETE FROM FRIDGE WHERE fid=".$fid.";";  
		$r1 = $db->query($q);

		$q = "DELETE FROM F_U WHERE fid=".$fid.";";  
		$r2 = $db->query($q);

		$q = "SELECT iid FROM F_I WHERE fid=".$fid.";";  
		$r3 = $db->query($q);

		if ( $r1 != FALSE && $r2 != FALSE && $r3 != FALSE )
		{
			$count = 0;
		
			while( $v = $r3->fetch() )
			{
				$iid = $v['iid'];

				// delete item
				$q = "DELETE FROM ITEM WHERE iid = ".$iid.";";
				$r4 = $db->query($q);
		
				//  delete I_U
				$q = "DELETE FROM I_U WHERE iid =" .$iid.";";
				$r5 = $db->query($q);

				if( $r4 == FALSE || $r5 == FALSE )
				{
					$count = $count + 1;
				}
			} 

			if ( $count == 0 )
			{
				$q = "DELETE FROM F_I WHERE fid=".$fid.";";  
				$r6 = $db->query($q);

				$link = $url[0]."/".$url[1]."/".$url[2]."/home.php?name=".$name."&msg=deleteSuccess";
				Header("Location:http://".$link);
			}
			else
			{
				$link = $url[0]."/".$url[1]."/".$url[2]."/home.php?name=".$name."&msg=deleteFail";
				Header("Location:http://".$link);
			}
		}
		else
		{
			$link = $url[0]."/".$url[1]."/".$url[2]."/home.php?name=".$name."&msg=deleteFail";
			Header("Location:http://".$link);
		}
	}
?>
