<? 
include 'header.php'; 
include 'connect.php';


$omg = ($_SESSION['Username']);



$row = mysql_fetch_array(mysql_query("SELECT User_Group FROM users WHERE Username = '". $omg ."'"));
$user_group = $row['User_Group'];

?>





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