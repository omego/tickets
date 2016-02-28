<? 
include 'header2.php';
include 'connect.php';
//include 'date-time-class.php';

$Real_Name_List = mysql_query("select Real_Name from users");
$Category_List = mysql_query("select Name from category");
$Floor_List = mysql_query("select Name from Floor");
$Status_List = mysql_query("select Status from Status");

$member_id = $_GET['id'];

$member_id_tickets = mysql_query("select * from tickets_entry where id = '" . $member_id . "'");

if (false === $member_id_tickets) {
    echo mysql_error();
}

$row1 = mysql_fetch_array($member_id_tickets); 


$Engineer_ID = $row1['Engineer_Name'];

//echo $Engineer_ID;

$eng_badge = mysql_query("select Badge from users where Real_Name = '". $row1['Engineer_Name'] ."'");

$row2 = mysql_fetch_array($eng_badge); 

$Engineer_LIST = $row2['Badge'];

?>



<script>
	// wait for the DOM to be loaded 
	$(document).ready(function() { 
		// bind 'myForm' and provide a simple callback function 
		$('#myForm').ajaxForm(function() { 
			Messenger().post({
			  message: 'Successful Created',
			});
			setTimeout(function() {
			  window.location.href = "ok-rating.php";
			}, 2000);
		});

	});

</script>

<? 
if ($row1['Ratings_Score'] == NULL) { ?>




	 <div class="container">

		<div class="panel panel-default">
		<div class="panel-body">

		<form id="myForm" action="rating-process.php" method="post" class="form-horizontal">
		<input  name="id_id" hidden="hidden" type="text" value="<?php echo $row1['id'] ?>">

		<!-- Form Name -->
		<legend>Please rate Mr.<? echo $row1['Engineer_Name']; ?></legend>

		<div class="row">
			<div class="col-md-4">
			</div>
		<div class="col-md-4">
		<div class="control-group">
		  <label class="control-label" for="Service_Description">Click on stars then send</label>
		  <div class="controls">  

			<input id="score" name="Ratings_Score" value="0" type="number" class="rating" min=0 max=5 step=1 data-size="xl" >

			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Send Rating</button>
		</div>

		</div>
		</div>
		<div class="col-md-4">
			</div>
		</div><!-- ROW END -->

		<div class="row">
<!-- Text input-->
<div class="col-md-4">



</div>
<div class="col-md-4">



</div>
<div class="col-md-4">



</div>

	</div><!-- ROW END -->

	</form>


</div></div>

<!-- /.stage 2 end -->

<script>
    jQuery(document).ready(function () {
    	$('#score').on('rating.change', function(event, value) {
	    console.log(value);
		});
		});

</script>


	 </div>
	 <!-- /.container -->

<? 
	# code...
} else {
?>
	 <div class="container">
<div class="panel panel-default">
		<div class="panel-body">

		<!-- Form Name -->
		<legend>You've already rated Mr.<? echo $row1['Engineer_Name']; ?></legend>

		<div class="row">
			<div class="col-md-4">
			</div>
		<div class="col-md-4">
		<div class="control-group">
		  <div class="controls">  

			<input id="score" name="Ratings_Score" value="<? echo $row1['Ratings_Score']; ?>" type="number" class="rating" min=0 max=5 step=1 data-size="xl" readonly=true >
		</div>

		</div>
		</div>
		<div class="col-md-4">
			</div>
		</div><!-- ROW END -->

		<div class="row">
<!-- Text input-->
<div class="col-md-4">



</div>
<div class="col-md-4">



</div>
<div class="col-md-4">



</div>

	</div><!-- ROW END -->

	</form>


</div></div>

<!-- /.stage 2 end -->


	 </div>
	 <!-- /.container -->

<?
}
?>



	<!-- Load JS here for greater good =============================-->
	<script src="js/bootstrap.js"></script>
	<script src="js/bootstrap.min.js"></script>




</body>
</html>