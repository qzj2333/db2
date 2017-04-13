<?php 
	session_start();
	if( isset($_SESSION["email"]) )
	{
		print_r($_SESSION);
		Header("Location: http://cs.gettysburg.edu/~arpsja01/dbproj/database/home.php");   // go to user account page
	} 
?>
<!DOCTYPE HTML>
<HTML lang="en">
<HEAD>
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
				<li><a href="signUpPage.php">Sign Up</a></li>
			 </ul>
		  </div>
		</nav>

		<div class="row">
			
			<div class="col-md-4 col-md-offset-4">
				<form class="form-signin" name="signIn" method=POST action="logIn.php">
	        		<h2 class="form-signin-heading">Please sign in</h2>

						<?php				
							$code = $_GET['err'];
							if($code == 'wrongPW')
							{
								print("<FONT color = 'yellow'>Wrong password.</FONT>");
							}
							else if($code == 'emailDNE')
							{
								print("<FONT color = 'yellow'>Email does not exist.</FONT>");
							}
							else if($code == 'success')
							{
								print("<FONT color = 'yellow'>Password updated. Please log in again.</FONT>");
							}
						?>

	        		<input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
	       		<input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>

	       		<div class="checkbox">
	          		<label>
	            		<input type="checkbox" value="remember-me"> Remember me
	          		</label>
	        		</div>

	        		<button class="btn btn-lg btn-primary btn-block" type="submit" value="signIn">Sign in</button>
	      	</form>

				<form method=POST action="forgotPWPage.php">
					<button class="btn btn-lg btn-primary btn-block" method=POST value="forgotPassword" style="padding:10px;">
					Forgot Password?
					</button>
				</form></BR>
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
