<?php
ob_start();
session_start();

if(isset($_SESSION['Username']))
{

?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<title>SIS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Loading Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap-theme.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	
<!-- 	<link href="css/desktop.css" rel="stylesheet" media="(min-width: 1200px)" />-->
	
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/miniNotification.js"></script>
	<script src="js/jquery.form.js"></script> 
	<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	<!--[if lt IE 9]>
	  <script src="js/html5shiv.js"></script>
	<![endif]-->
  </head>
  <body>

<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
	  <a class="navbar-brand" href="index.php">Support Tickets System</a>
	</div>


	  <form class="navbar-form navbar-left" role="search">
		<div class="form-group">
		  <input type="text" class="form-control" placeholder="Search">
		</div>
		<button type="submit" class="btn btn-default">Submit</button>
	  </form>


	  <p class="navbar-text navbar-right">Signed in as <strong> <? echo $_SESSION['Username']; ?></strong>, <a href="logout.php">logout</a></p>




  </div><!-- /.container-fluid -->
</nav>


<?

}
else
{
  // Not logged in
  header('Location: login.php');
  exit();
}

?>