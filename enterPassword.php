<!doctype html>
<html lang='en'>
<head>
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

  <title> Reset Password | Fridge Manager </title>

  <link href="resetPassword.css" rel="stylesheet">
  <link href="bootstrap.min.css" rel="stylesheet">

  <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

</head>

<body>

  <div class="site-wrapper">

    <div class="site-wrapper-inner">

      <div class="cover-container">

        <div class="masthead clearfix">
          <div class="inner">
          <h3 class="masthead-brand"> Fridge Manager </h3>
          <nav>
            <ul class="nav masthead-nav">
              <li><a href="main.php">Home</a></li>
	      <li><a href="signUpPage.php">Sign Up</a></li>
              <li class="active"><a href="#">Reset Password</a></li>
            </ul>
          </div>
        </div>

        <div class="container">
<?php
	$email = $_GET['op']; 
	$code  = $_GET['err'];
?>
          <form class="form-resetPass" name="resetPass" method=POST 
		action='resetPassword.php?op=<?php echo $email; ?>'>
            <h2 class="form-resetPass-heading">Enter your new password</h2>

	<?php
		if($code == 'pwNM')
		{
			print("<FONT color='yellow'> Password did not match.</FONT>");
		}
	?>

            <!--<label for="inputPassword" class="sr-only">Password</label>-->
            <input type="password" id="inputPassword" name = 'inputPassword' class="form-control" placeholder="Password" required>
            <input type="password" id="repeatPassword" name = 'repeatPassword' class="form-control" placeholder="Repeat Password" required>

            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" value="Enter">Reset Password</button>
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
