<? 
include 'header.php';
include 'connect.php';

$eng_info = mysql_query("select * from users where Username = '".$_SESSION['Username']."'");
$row1333 = mysql_fetch_array($eng_info);

?>





<script>
	jQuery(function(){
        $("#submit").click(function(){
        $(".error").hide();
        var hasError = false;
        var passwordVal = $("#Password").val();
        var checkVal = $("#Password-check").val();
        if (passwordVal == '') {
            $("#Password").after('<span class="error">Please enter a password.</span>');
            hasError = true;
        } else if (checkVal == '') {
            $("#Password-check").after('<span class="error">Please re-enter your password.</span>');
            hasError = true;
        } else if (passwordVal != checkVal ) {
            $("#Password-check").after('<span class="error">Passwords do not match.</span>');
            hasError = true;
        }
        if(hasError == true) {return false;}
    });
});




	// wait for the DOM to be loaded 
	$(document).ready(function() { 
		// bind 'myForm' and provide a simple callback function 
		$('#myForm').ajaxForm(function() { 
			Messenger().post({
			  message: 'Successfully Updated',
			});
			setTimeout(function() {
			  window.location.href = "index.php";
			}, 2000);
		}); 
	}); 	
</script>					


<div class="container">
		
		<div class="panel panel-default">
		<div class="panel-body">
		
		<form id="myForm" action="edit-user-password.php" method="post" class="form-horizontal">
		

		
		<!-- Form Name -->
		<!-- Form Name -->
			<legend>Password Change</legend>
		
			<div class="row">
		
			<!-- Text input-->
			<div class="col-sm-4">
			<div class="control-group">
			  <label class="control-label" for="Password">New Password</label>
			  <div class="controls">
				<input id="Password" name="Password" value="" placeholder="New Password" class="form-control input-lg" type="password">
			  </div>
			</div>
			</div>

			<!-- Text input-->
			<div class="col-sm-4">
			<div class="control-group">
			  <label class="control-label" for="Password-check">Re-Type</label>
			  <div class="controls">
				<input id="Password-check" name="Password-check" value="" placeholder="" class="form-control input-lg" type="password">
			  </div>
			</div>
			</div>

			<!-- Text input-->
			<div class="col-sm-4">
			<div class="control-group">
			  <label class="control-label" for="submit"></label>
			  <div class="controls">
				<button type="submit" id="submit" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-refresh"></span> Update Password</button>
			  </div>
			</div>
			</div>

			</div>
			</form>
</div>
</div>
</div>


	<script src="js/bootstrap.js"></script>
	<script src="js/bootstrap.min.js"></script>