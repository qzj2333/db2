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

   <title>Add Item</title>


	<!--
   <link href="home.css" rel="stylesheet">
   <link href="bootstrap.min.css" rel="stylesheet">
	-->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
	integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<script src="jquery-3.2.0.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
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
   
   <script>
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
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
              		<li><a href="accountPage.php">Account Settings</a></li>
			<li><a href="fridgeInfo.php">Fridge Information</a></li>
			<li class="active"><a href="#">Add Item</a></li>
              		<li><a href="logOut.php">Logout</a></li>
		 </ul>
	  </div>
	</nav>

	<div class="row">
		<div class="col-md-col-6 col-md-offset-3">
			<form class="form-group" name="addItem" enctype='multipart/form-data' method=POST action='addItem.php'>
				<div class="form-group row">
					<div class="col-sm-7">
						<h2>Add New Item</h2>
<?php
	$meg = $_GET['meg'];
	if( $meg == 'FAIL' )
	{
		print("<FONT color = 'yellow'>Item create unsuccessfully.</FONT>");
	}
?>
<BR /><BR />
            Location in the fridge: <INPUT type='text' name='location' size = '15' />      <BR />
	    Unit price: 	    <INPUT type='text' name='price' placeholder = 'Enter numbers only' size = '15' />         <BR />
	    Amount: 		    <INPUT type='text' name='amount' placeholder = 'Enter integers only' size = '15' />        <BR />
	    Place bought: 	    <INPUT type='text' name='place_bought' size = '15' />  <BR />
	    Date purchased: 	    <INPUT type='date' name='D_purchased' placeholder = 'yyyy-mm-dd' size = '15' />  <BR />
	    Date expired: 	    <INPUT type='date' name='D_exp' placeholder = 'yyyy-mm-dd' size = '15' /> 
	    <H4> Item Name </H4>
	<!-- list all itemInfo in data table-->
	
	<?php
		$q = 'SELECT name FROM ITEM_INFO;';
		$r = $db->query($q);
	
		while( $row = $r->fetch() )
		{
			$name = $row['name'];
			printf("<input type='radio' name='rb' value='%s'>%s</input> <br />\n",$row['name'],$row['name']);
		}
	?>
	<H5> None of the above: Please enter information to create new item</H5>
	Name:        <INPUT type='text' name='name' size = '15' />   <BR />
	Type:        <INPUT type='text' name='type' size = '15' />   <BR />
 	Description: <INPUT type='text' name='desc' size = '30' />   <BR />
	Image:       <INPUT type='file' name='itemPict'>  <BR /><BR />
	
<!--	Upload image for refrigerator: <INPUT type='file' name='fridgePic'> -->
	
						<div class="input-group">
						<input type="text" class="form-control" readonly><br><br>
							<label>
								<span class="btn btn-primary">
									Browse <input type="file" style="display: none;">
								</span>
							</label>	
						<button class="btn btn-primary"type="submit" value="add_item"><span class="glyphicon glyphicon-circle-arrow-up"></span> Upload</a>
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
