<?php
	session_start(); 
	if(!empty($_GET['id']) )
	{
		$_SESSION['fid'] = $_GET['id'];
	}
	if(!empty($_GET['op']) )
	{
		$_SESSION['nname'] = $_GET['op'];
	}
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
				<li><a href="accountPage.php">Account Settings</a></li>
				<li  class="active"><a href="#">Fridge Information</a></li>
				<li><a href="logOut.php">Logout</a></li>
			 </ul>
		  </div>
		</nav>

		<div class="row">
			<div class="col-md-8 col-md-offset-1">
				<h3>Items in Fridge: <?php echo $_SESSION['nname'] ?></h3>   <!-- $_SESSION['nname'] is the nname of the fridge> -->

<?php
	$meg = $_GET['meg'];
	if( $meg == 'success' )
	{
		print("<FONT color = 'yellow'>Amount update successfully.</FONT>");
	}
	else if( $meg == 'fail' )
	{
		print("<FONT color = 'yellow'>Fail to update.</FONT>");
	}
	else if( $meg == 'SUCCESS' )
	{
		print("<FONT color = 'yellow'>Item create successfully.</FONT>");
	}
?>
</BR></BR>

				<!-- make header of the table of items in this fridge -->
				<table class="table">
					<TR>
						<TH>ID</TH>
						<TH>Name</TH>
						<TH>Location</TH>
						<TH>Amount Left</TH>
						<TH>Exp. Date</TH>
					</TR>

					<?php
						include_once("db_connect.php");

						$q = 'SELECT IID, NAME, LOCATION, AMOUNT, D_EXP FROM ITEM NATURAL JOIN F_I NATURAL JOIN ITEM_INFO WHERE FID = ' .$_SESSION['fid']. ';';
						$r = $db->query($q);					
						while($row = $r->fetch() )
						{
							printf("<TR>\n");
							printf("<TD><a href=itemInfo.php?op=%s>%s</a></TD>\n", $row['IID'],  $row['IID'] );   // click item id will go to curr item
							printf("<TD>%s</TD>\n", $row['NAME']);
							printf("<TD>%s</TD>\n", $row['LOCATION']);
							printf("<TD>%s</TD>\n", $row['AMOUNT']);
							printf("<TD>%s</TD>\n", $row['D_EXP']);
							printf("<FORM name='editItem' method=POST action='editItem.php?op=%s'>\n",$row['IID']);
							printf("<TD>\n");
							printf("<INPUT type='text' name='newAmount' placeholder = 'Enter integer only' size='15'>\n");	
							printf("</TD>\n");
							printf("<TD>\n");
							printf("<INPUT type='submit' value='Update'>\n");
							printf("</TD>\n");
							printf("</FORM>\n");	
							printf("</TR>\n");							
						} 
					?> 
					
				</table> 
			<FORM name='newItem' action='addItemPage.php' method='POST'>
				<INPUT type='submit' value='Add New Item'>
			</FORM> </BR>
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
