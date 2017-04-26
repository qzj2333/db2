<!DOCTYPE HTML>
<HTML lang="en">
<HEAD>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<TITLE>Home | Fridge Manager</TITLE>

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
				<li class="active"><a href="#">Home</a></li>
				<li><a href="accountPage.php">Account Settings</a></li>
				<li><a href="logOut.php">Logout</a></li>
			 </ul>
		  </div>
		</nav>

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
			
				</BR><center><H2>Your current refrigerators:</H2></center>
				
			<div class="row">
				<div class="col-md-4">
			<!-- This code should work to display every fridge for the user. -->

				<?php
					session_start(); 
					include_once("db_connect.php");	
					$email = $_SESSION["email"];
					$q = "SELECT fid, picture, nname FROM FRIDGE NATURAL JOIN F_U WHERE email='".$email."';";  
					$r = $db->query($q);	
					
					while( $i = $r->fetch() ){
					
					$fid     = $i['fid'];
					$nname   = $i['nname'];
					$picture = $i['picture'];
					
					print "<div class='thumbnail'>";
					print "<a href='fridgeInfo.php?id=$fid&op=$nname'>";
					print "<img src='fridges/f$fid.$picture' height=200 width=200>";
					print "<div class='caption'>";
					print "<p>$nname, $fid, $picture</p>";
					print "</div></a></div>";
					
					$counter = 0;
					
						while($counter < 2 && $j = $r->fetch() ){
						
							$fid     = $j['fid'];
							$nname   = $j['nname'];
							$picture = $j['picture'];
							
							print "<div class='col-md-4'>";
							print "<div class='thumbnail'>";
							print "<a href='fridgeInfo.php?id=$fid&op=$nname''>";
							print "<img src='fridges/f$fid.$picture' height=200 width=200>";
							print "<div class='caption'>";
							print "<p>$nname, $fid, $picture</p>";
							print "</div></a></div>";
							
							++$counter;
						}
					
					print "</row><div class='row'><div class='col-md-4'>";	
					
					}					
				?>

				</BR> </BR>

				<FORM name='newFridge' action='addFridge.php' method='POST'>
					<INPUT type='submit' value='Add Fridge'>
				</FORM></BR>
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
