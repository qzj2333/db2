<?php
	session_start(); 	
	include_once("db_connect.php");	
?>

<!DOCTYPE HTML>
<HTML lang="en">
<HEAD>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<TITLE>Home | Fridge Manager</TITLE>
	
	<!--
	<link href="home.css" rel="stylesheet">
	<link href="bootstrap.min.css" rel="stylesheet">
	-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
	integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<script src="../../assets/js/ie-emulation-modes-warning.js"></script>
	
	

</HEAD>

<BODY>
	<div class="container">
				
		<nav class="navbar navbar-default">
		 	<div class="container-fluid">
			 <div class="navbar-header">
				<a class="navbar-brand" href="#">Fridge Manager</a>
			 </div>
			 <ul class="nav navbar-nav">
				<li><a href="home.php">Home</a></li>		
				<li class="active"><a href="#">Account Settings</a></li>
				<li><a href="logOut.php">Logout</a></li>
			 </ul>
		  </div>
		</nav>

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
			</BR>
 					<H2>Account Settings</H2>
<?php
	$meg = $_GET['meg'];
	if( $meg == 'emailSuccess' )
	{
		print("<FONT color = 'yellow'>Email changed successfully.</FONT>");
	}
	else if( $meg == 'emailExist' )
	{
		print("<FONT color = 'yellow'>Email already exist.</FONT>");
	}
	else if( $meg == 'pwSuccess' )
	{
		print("<FONT color = 'yellow'>Password changed successfully.</FONT>");
	}
	else if( $meg == 'pwRepMis' )
	{
		print("<FONT color = 'yellow'>Password does not match with its confirmation.</FONT>");
	}
	else if( $meg == 'pwNotMatch' )
	{
		print("<FONT color = 'yellow'>Current password is invalid.</FONT>");
	}
	else if( $meg == 'name' )
	{
		print("<FONT color = 'yellow'>Name changed Successfully</FONT>");
	}
	else if( $meg == 'fail' )
	{
		print("<FONT color = 'yellow'>Information changed unsuccessfully.</FONT>");
	}
	
?>
<?php
	$q = "SELECT fname, lname, mname FROM USER WHERE email = '" . $_SESSION["email"]."';";
	$r = $db->query($q);
	
	$v = $r->fetch();
	$fname = $v['fname'];
	$lname = $v['lname'];
	$mname = $v['mname'];
	printf("<P>Welcome back! <FONT color='black'>%s %s. %s</FONT></P>\n", $fname, $mname, $lname);
?>

					<H3>Personal Information</H3>

					<FORM name='fname' action='accountSetting.php?op=fname' method='POST'>
						Change First Name: <INPUT type='text' name='fname'>
						<INPUT type='submit' value='OK'>
					</FORM><BR />
					<FORM name='lname' action='accountSetting.php?op=lname' method='POST'>
						Change Last Name: <INPUT type='text' name='lname'>
						<INPUT type='submit' value='OK'>
					</FORM><BR />
					<FORM name='mname' action='accountSetting.php?op=mname' method='POST'>
						Change Middle Name: <INPUT type='text' name='mname'>
						<INPUT type='submit' value='OK'>
					</FORM><BR />

					<H3>Account Details</H3>
					<FORM name='newEmail' action='accountSetting.php?op=email' method='POST'>
						Change Email Address: <INPUT type='text' name='email'><BR /><BR />
						<INPUT type='submit' value='Update Email'>
					</FORM><BR />

					<FORM name='newPW' action='accountSetting.php?op=pw' method='POST'>
						Change Password: <INPUT type='password' name='pw'> <BR /><BR />
						Confirm New Password: <INPUT type='password' name='npw'> <BR /><BR />
						Confirm Current Password: <INPUT type='password' name='opw'><BR /><BR />
						<INPUT type='submit' value='Update Password'>
					</FORM><BR />
				
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
	<script src="../../dist/js/bootstrap.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

</BODY>

</HTML>
