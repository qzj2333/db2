<!doctype html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <TITLE>Fridge Manager</TITLE>

	<!--
  <link href="main.css" rel="stylesheet">
  <link href="bootstrap.min.css" rel="stylesheet">
	-->
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
	integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
  
</head>
<body>
	<div class="container">

		<nav class="navbar navbar-default">
		 	<div class="container-fluid">
			 <div class="navbar-header">
				<a class="navbar-brand" href="#">Fridge Manager</a>
			 </div>
			 <ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="signUpPage.php">Sign Up</a></li>
			 </ul>
		  </div>
		</nav>

		<div class="row">
		
			<div class="col-md-6 col-md-offset-3">

				<form class="form" name="enterEmail" method=POST action="forgotPW.php">
		      	<h1 class="form-heading">Enter your email address:</h1>

					<?php
						$op = $_GET['op'];
						if ($op == 'message')
						{
							print("<FONT color = 'yellow'>The reset password page is sent through email.Please check your email.</FONT>");
						}
						else if($op == 'emailDNE')
						{
							print("<FONT color = 'yellow'>Email does not exist. Please check your email or create a new account.</FONT>");
						}
					?>

		      	<input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
					<button class="btn btn-lg btn-primary btn-block" method=POST value="forgotPassword">Submit</button>
		      </form>
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

</body>
