<?
	session_start(); 
	include_once("db_connect.php");	
	$url = explode("/", $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	$op = $_GET['op'];
	if( $op == 'fname' )
	{
		$fname = $_POST['fname']; 
		$q = "UPDATE USER SET fname = '" . $fname . "' WHERE email = '" . $_SESSION['email'] . "';";
		$r = $db->query($q);
		if($r != FALSE )   
		{
			$link = $url[0]."/".$url[1]."/".$url[2]."/accountPage.php?meg=name";
			Header("Location:http://".$link);
		}
		else
		{
			$link = $url[0]."/".$url[1]."/".$url[2]."/accountPage.php?meg=fail";
			Header("Location:http://".$link);
		}
	}
	else if( $op == 'lname' )
	{
		$lname = $_POST['lname']; 
		$q = "UPDATE USER SET lname = '" . $lname . "' WHERE email = '" . $_SESSION['email'] . "';";
		$r = $db->query($q);
		if($r != FALSE )   
		{
			$link = $url[0]."/".$url[1]."/".$url[2]."/accountPage.php?meg=name";
			Header("Location:http://".$link);
		}
		else
		{
			$link = $url[0]."/".$url[1]."/".$url[2]."/accountPage.php?meg=fail";
			Header("Location:http://".$link);
		}
	}
	else if( $op == 'mname' )
	{
		$mname = $_POST['mname']; 
		$q = "UPDATE USER SET mname = '" . $mname . "' WHERE email = '" . $_SESSION['email'] . "';";
		$r = $db->query($q);
		if($r != FALSE )   
		{
			$link = $url[0]."/".$url[1]."/".$url[2]."/accountPage.php?meg=name";
			Header("Location:http://".$link);
		}
		else
		{
			$link = $url[0]."/".$url[1]."/".$url[2]."/accountPage.php?meg=fail";
			Header("Location:http://".$link);
		}
	}
	else if( $op == 'email' )
	{
		$email = $_POST['email']; 
		
		$q = "SELECT email FROM USER WHERE email = '" . $email . "';";
		$r = $db->query($q);
		echo $r->rowCount();
		if( $r->rowCount() != 0 )
		{
			$link = $url[0]."/".$url[1]."/".$url[2]."/accountPage.php?meg=emailExist";
			Header("Location:http://".$link);
		}
		else
		{
			$q = "UPDATE USER SET email = '" . $email . "' WHERE email = '" . $_SESSION['email'] . "';";
			$r1 = $db->query($q);
			$q  = "UPDATE F_U SET email = '" . $email . "' WHERE email = '" . $_SESSION['email'] . "';";
			$r2 = $db->query($q);
			$q  = "UPDATE I_U SET email = '" . $email . "' WHERE email = '" . $_SESSION['email'] . "';";
			$r3 = $db->query($q);
			if($r1 != FALSE && $r2 != FALSE && $r3 != FALSE)   
			{
				$_SESSION['email'] = $email;			
				
				$link = $url[0]."/".$url[1]."/".$url[2]."/accountPage.php?meg=emailSuccess";
				Header("Location:http://".$link);
			}
			else
			{
				$link = $url[0]."/".$url[1]."/".$url[2]."/accountPage.php?meg=fail";
				Header("Location:http://".$link);
			}
		}
	}
	else if( $op == 'pw' )
	{
		$pw = $_POST['pw'];    // new pw 
		$npw = $_POST['npw'];  // repeat new pw
		if( $pw != $npw )
		{
			$link = $url[0]."/".$url[1]."/".$url[2]."/accountPage.php?meg=pwRepMis";
			Header("Location:http://".$link);
		}
		else
		{
			$opw = $_POST['opw'];    
			$opw = md5($opw);      // encode opw  
			$q = "SELECT password FROM USER WHERE email = '" . $_SESSION['email'] . "';";
			$r = $db->query($q);
			$v = $r->fetch();
			$currPW = $v['password']; // encode pw in data
			if( $opw != $currPW )
			{
				$link = $url[0]."/".$url[1]."/".$url[2]."/accountPage.php?meg=pwNotMatch";
				Header("Location:http://".$link);
			}
			else
			{
				$q = "UPDATE USER SET password = '" . md5($pw) . "' WHERE email = '" . $_SESSION['email'] . "';";
				$r = $db->query($q);
				if($r != FALSE )
				{
					$link = $url[0]."/".$url[1]."/".$url[2]."/accountPage.php?meg=pwSuccess";
					Header("Location:http://".$link);
				}
				else
				{
					$link = $url[0]."/".$url[1]."/".$url[2]."/accountPage.php?meg=fail";
					Header("Location:http://".$link);
				}
			}
		}
	}
?>
