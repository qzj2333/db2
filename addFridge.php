<?php
	session_start();
	include_once("db_connect.php");
	$email = $_SESSION["email"];
?>

<!doctype html>
<html lang='en'>
<head>
   <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

   <title>Add Fridge</title>


	<!--
   <link href="home.css" rel="stylesheet">
   <link href="bootstrap.min.css" rel="stylesheet">
	-->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
	integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<script src="jquery-3.2.0.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
   <script>
   	
	$(function(){
		$(document).on('change', ':file', function() {
 			var input = $(this),
     		numFiles = input.get(0).files ? input.get(0).files.length : 1,
     		label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
 			input.trigger('fileselect', [numFiles, label]);
		});
		
		$(document).ready(function(){
			$(':file').on('fileselect', function(event, numFiles, label) {

			var input = $(this).parents('.input-group').find(':text'),
			  log = numFiles > 1 ? numFiles + ' files selected' : label;

			if( input.length ) {
			  input.val(log);
			} else {
			  if( log ) alert(log);
			}

		   });
		});
	});
	
   </script>

</head>

<body>

  <div class="container">

	<nav class="navbar navbar-default">
	 	<div class="container-fluid">
		 <div class="navbar-header">
			<a class="navbar-brand" href="#">Fridge Manager</a>
		 </div>
		 <ul class="nav navbar-nav">
			<li><a href="home.php">Home</a></li>
			<li><a href="signUpPage.php">Account Settings</a></li>
			<li><a href="logOut.php">Logout</a></li>
		 </ul>
	  </div>
	</nav>

	<div class="row">
		<div class="col-md-col-6 col-md-offset-3">
			<form class="form-group" name="addFridge" enctype='multipart/form-data' method=POST action='fridgeAdded.php'>
				<div class="form-group row">
					<div class="col-sm-7">
						<h2>Add a New Refrigerator</h2>
						<INPUT type='text' class="form-control" name='name' placeholder='Fridge Name'/>    <BR />
						<INPUT type='text' class="form-control" name='price' placeholder='Price'/>  <BR />
						<INPUT type='text' class="form-control" name='brand' placeholder='Brand'/>  <BR />
						<INPUT type='date' class="form-control" name='date' placeholder='Purchase Date (yyyy-mm-dd)'/>  <BR />
						<INPUT type='text' class="form-control" name='warranty' placeholder='Warranty (years)'/>  <BR />
						<div class="input-group">
						<input type="text" class="form-control" readonly><br><br>
							<label>
								<span class="btn btn-primary">
									Browse <input type="file" style="display: none;">
	
								</span>
							</label>	
						
						<button class="btn btn-primary"type="submit" value="add_fridge"><span class="glyphicon glyphicon-circle-arrow-up"></span> Upload</a>
						</div>
						
					</div>
				</div>
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
