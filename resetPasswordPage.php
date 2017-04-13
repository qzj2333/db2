<!doctype html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <TITLE>Fridge Manager</TITLE>

  <link href="main.css" rel="stylesheet">
  <link href="bootstrap.min.css" rel="stylesheet">

  <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
</head>
<body>
  <div class="site-wrapper">

		<div class="site-wrapper-inner">

			<div class="cover-container">

				<div class="masthead clearfix">
					<div class="inner">
						<h3 class="masthead-brand">Fridge Manager</h3>
						<nav>
							<ul class="nav masthead-nav">
								<li class="active"><a href="#">Home</a></li>
								<li><a href="signUpPage.php">Sign Up</a></li>
							</ul>
						</nav>
					</div>
				</div>

				<div class="container">

					<form class="form" name="signIn" method=POST action="forgotPW.php">
		        <h2 class="form-heading">Enter your email address</h2>

<?php
	$op = $_GET['op'];
	if ($op == 'message')
	{
		print("The reset password page is sent through email.Please check your email. ");
	}
?>

		        <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
						<button class="btn btn-lg btn-primary btn-block" method=POST value="forgotPassword">Submit</button>
		      </form>

				</div>

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
