<!doctype html>
<html lang='en'>
<head>
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

  <title> Sign Up </title>
	
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
			<li><a href="main.php">Home</a></li>
			<li class="active"><a href="#">Sign Up</a></li>
		 </ul>
	  </div>
	</nav>

	<div class="row">
		<div class="col-md-6 col-md-offset-2">
	
			<form class="form-signin" name="signUp" method=POST action='signUp.php'>
				<h2 class="form-signin-heading">Register a new account</h2>

				<?php
					$code = $_GET['err'];

					if($code == 'emailExist')
					{
						print("<FONT color = 'yellow'>email already exist.</FONT>");
					}
					else if($code == 'pwNM')
					{
						print("<FONT color = 'yellow'>Password did not match.</FONT>");
					}
				?>

            <input type="email" id="inputEmail" name ="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
            <input type="password" id="repeatPassword" name="repeatPassword" class="form-control" placeholder="Repeat Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit" value="register">Register</button>
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
