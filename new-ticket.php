<?

include 'connect.php';
include 'date-time-class.php';

$Real_Name_List = mysql_query("select Real_Name from users");
$Category_List = mysql_query("select Name from category");

?>



<script> 
	// wait for the DOM to be loaded 
	$(document).ready(function() { 
		// bind 'myForm' and provide a simple callback function 
		$('#myForm').ajaxForm(function() { 
			Messenger().post({
			  message: 'The Ticket Has been Submitted',
			  showCloseButton: true
			});
			$('#testmod').modal('hide');

		});
		 
	}); 
</script> 




		<div class="modal fade" id="testmod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Create New Ticket</h4>
			  </div>
			  <div class="modal-body">
		<form id="myForm" action="ticket-process.php" method="post" class="form-horizontal">
		
		
		<div class="row">
		
		<!-- Text input-->
		<div class="col-sm-4">
		<div class="control-group">
		  <label class="control-label" for="Report_No">Report No</label>
		  <div class="controls">
			<input id="Report_No" name="Report_No" value="<? echo $Report_Date ; ?>" placeholder="" class="form-control input-lg" type="text">
			<p class="help-block">Auto Generate</p>
		  </div>
		</div>
		</div>
		
		<!-- Text input-->
		<div class="col-sm-4">
		<div class="control-group">
		  <label class="control-label" for="Ticket_Create_Date">Date</label>
		  <div class="controls">
			<input id="Ticket_Create_Date" name="Ticket_Create_Date" value="<? echo $Ticket_Date ; ?>" placeholder="" class="form-control input-lg" type="text">
			<p class="help-block">Auto Generate</p>
		  </div>
		</div>
		</div>
		
		<!-- Text input-->
		<div class="col-sm-4">
		<div class="control-group">
		  <label class="control-label" for="Ticket_Create_Time">Time</label>
		  <div class="controls">
			<input id="Ticket_Create_Time" name="Ticket_Create_Time" value="<? echo $Ticket_Time; ?>" placeholder="" class="form-control input-lg" type="text">
			<p class="help-block">Auto Generate</p>
		  </div>
		</div>
		</div>
		
	</div><!-- ROW END -->
		
		<div class="row">
			<!-- Select Basic -->
			<div class="col-md-12">
			<div class="control-group">
			  <label class="control-label" for="Ticket_title">Ticket title</label>
			  <div class="controls">
				<input id="$Ticket_title" name="Ticket_title" value="<? echo $Ticket_title ; ?>" placeholder="" class="form-control input-lg" type="text">
			  </div>
			</div>
			</div>
			</div><!-- ROW END -->
			
		<div class="row">
		<!-- Select Basic -->
		<div class="col-md-4">
		<div class="control-group">
		  <label class="control-label" for="Location_Building">Building</label>
		  <div class="controls">
			<select id="Location_Building" name="Location_Building" class="form-control input-lg">
			  <option>COMJ</option>
			</select>
		  </div>
		</div></div>
		
		<!-- Text input-->
		<div class="col-md-4">
		<div class="control-group">
		  <label class="control-label" for="Location_Room_No">Room No</label>
		  <div class="controls">
			<input id="Location_Room_No" name="Location_Room_No" placeholder="" class="form-control input-lg" type="text">
		
		  </div>
		</div></div>
		
		<!-- Select Basic -->
		<div class="col-md-4">
		<div class="control-group">
		  <label class="control-label" for="Location_Floor">Floor</label>
		  <div class="controls">
			<select id="Location_Floor" name="Location_Floor" class="form-control input-lg">
			  <option>Ground</option>
			  <option>First</option>
			  <option>Second</option>
			  <option>Third</option>
			  <option>Fourth</option>
			</select>
		  </div>
		</div></div>
		
		</div><!-- ROW END -->
		
		<div class="row">
		<!-- Textarea -->
		<div class="col-md-12">
		<div class="control-group">
		  <label class="control-label" for="Service_Description">Service Description</label>
		  <div class="controls">                     
			<textarea class="form-control input-lg" rows="3" id="Service_Description" name="Service_Description">Details ...</textarea>
		  </div>
		</div></div>
		
		</div><!-- ROW END -->
		
		<div class="row">
		<!-- Text input-->
		<div class="col-md-6">
		<div class="control-group">
		  <label class="control-label" for="Engineer_Name">Engineer's Name</label>
		  <div class="controls">
			<select id="Engineer_Name" name="Engineer_Name" class="form-control input-lg">
				
				<? while($row = mysql_fetch_array($Real_Name_List)){ ?>
					<option><? echo $row['Real_Name']; ?></option>
			 	<? } ?>
			</select>
		
		  </div>
		</div></div>
		
		<!-- Text input-->
		<div class="col-md-6">
		<div class="control-group">
		  <label class="control-label" for="Engineer_Badge_No">Ticket Category</label>
		  <div class="controls">
			<select id="Ticket_Category" name="Ticket_Category" class="form-control input-lg">
				<? while($row2 = mysql_fetch_array($Category_List)){ ?>
						<option><? echo $row2['Name']; ?></option>
				 	<? } ?>
			</select>
		  </div>
		</div></div>
		
		
		</div><!-- ROW END -->
		

		
		
	  </div>
      	  <div class="modal-footer">
      		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      		<button id="sub" type="submit" class="btn btn-primary">Create</button>
      	  </div>
      	  </form>
      	</div>
        </div>
      </div>
		
	 <!-- /.container -->


	<!-- Load JS here for greater good =============================-->
	<script src="js/bootstrap.js"></script>
	<script src="js/bootstrap.min.js"></script>




</body>
</html>