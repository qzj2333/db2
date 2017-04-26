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
				<li class="active"><a href="home.php">Home</a></li>
				<li><a href="accountPage.php">Account Settings</a></li>
				<li><a href="fridgeInfo.php">Fridge Information</a></li>
				<li  class="active"><a href="#">Item Information</a></li>
				<li><a href="logOut.php">Logout</a></li>
			 </ul>
		  </div>
		</nav>
		
		<!-- todo: add link back to specific fridge-->
		
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h3>Item No. <?php echo $_GET['op'] ?></h3>   <!-- $_GET['op'] is the iid of the item> -->
				
				<div class="thumbnail">
				
					<?php
						session_start(); 
						include_once("db_connect.php");

						$iid = $_GET['op'];
						$q = 'SELECT * FROM ITEM NATURAL JOIN ITEM_INFO WHERE IID = ' .$iid. ';';
						$r = $db->query($q);
						
						$row  = $r->fetch();
						$id   = $row['infoID'];
						$name = $row['NAME'];
						$type = $row['type'];
						$desc = $row['description'];
						$amt  = $row['amount'];
						$loc  = $row['location'];
						$cost = $row['price'];
						$dpur = $row['D_purchased'];
						$dexp = $row['D_exp'];
						$form = $row['picture'];
						print "<img src='image/i$id.$form'>";
						print "<div class='caption'>";
						print "<p>Name: $name</p>";
						print "<p>Type: $type</p>";
						print "<p>Description: $desc</p>";
						print "<p>Amount: $amt</p>";
						print "<p>Location: $loc</p>";
						print "<p>Price: $cost</p>";
						print "<p>Date Purchased: $dpur</p>";
						print "<p>Expiration Date: $dexp</p>";
						print "</div></div>";
						
					?> 
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
