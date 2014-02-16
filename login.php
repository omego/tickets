<? 
include 'connect.php';

?>

	<!-- Loading Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap-theme.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<div class="container">

<div id="fullscreen_bg" class="fullscreen_bg"/>



	<form class="form-signin" action="login-process.php" method="post">
		
		<h1 class="form-signin-heading text-muted">Sign In</h1>

		<input type="text" name="Username" class="form-control" placeholder="Username" required="" autofocus="">
		<input type="password" name="Password" class="form-control" placeholder="Password" required="">
		<button class="btn btn-lg btn-primary btn-block" type="submit">
			Sign In
		</button>
	</form>

</div>



	</div>
	<!-- /.container -->
  </body>
</html>
