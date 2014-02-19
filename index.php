<? 
include 'header.php'; 
include 'connect.php';


$omg = ($_SESSION['Username']);



$row = mysql_fetch_array(mysql_query("SELECT User_Group FROM users WHERE Username = '". $omg ."'"));
$user_group = $row['User_Group'];

?>


<!-- set up the modal to start hidden and fade in and out -->
<div id="myModal" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
<!-- dialog body -->
<div class="modal-body">
<button type="button" class="close" data-dismiss="modal">&times;</button>
Hello world!
</div>
<!-- dialog buttons -->
<div class="modal-footer"><button type="button" class="btn btn-primary">OK</button></div>
</div>
</div>
</div>


	 <div class="container">
		<?
		
		if ($user_group == "Administrator"){
			include 'admin-cp.php';
			echo "Administrator";
		}elseif ($user_group == "Users"){
			include 'user-cp.php';
			echo "Users";
		}
		
		?>
		
	 </div>
	 <!-- /.container -->


	<!-- Load JS here for greater good =============================-->
	<script src="js/bootstrap.js"></script>
	<script src="js/bootstrap.min.js"></script>




</body>
</html>