<? 
include 'header.php';
include 'connect.php';
include 'date-time-class.php';

$Real_Name_List = mysql_query("select Username from users");
$Category_List = mysql_query("select Name from category");
$Status_List = mysql_query("select Status from Status");

$member_id = $_GET['id'];

$member_id_tickets = mysql_query("select * from tickets_entry where id = $member_id");

$row1 = mysql_fetch_array($member_id_tickets); 


 $Engineer_ID = $row1['Engineer_ID'];

//echo $Engineer_ID;

$Engineer_IDLIST = mysql_query("select Badge from users where id = $Engineer_ID");

$row2 = mysql_fetch_array($Engineer_IDLIST); 

 $Engineer_IDLIST = $row2['Badge'];

//echo $Engineer_IDLIST;

?>





	 <div class="container">
		
		<div class="panel panel-default">
		<div class="panel-body">
		
		<form action="edit-ticket-process.php" method="post" class="form-horizontal">
		
		<input  name="id_id" hidden="hidden" type="text" value="<?php echo $row1['id'] ?>">
		
		<!-- Form Name -->
		<!-- Form Name -->
			<legend>Ticket Orginal Information</legend>
		
			<div class="row">
		
			<!-- Text input-->
			<div class="col-sm-4">
			<div class="control-group">
			  <label class="control-label" for="Report_No">Report No</label>
			  <div class="controls">
				<input id="Report_No" name="Report_No" value="<? echo $row1['Report_No'] ; ?>" placeholder="" class="form-control input-lg" type="text">
				<p class="help-block">Auto Generate</p>
			  </div>
			</div>
			</div>
		
			<!-- Text input-->
			<div class="col-sm-4">
			<div class="control-group">
			  <label class="control-label" for="Ticket_Create_Date">Date</label>
			  <div class="controls">
				<input id="Ticket_Create_Date" name="Ticket_Create_Date" value="<? echo $row1['Ticket_Create_Date'] ; ?>" placeholder="" class="form-control input-lg" type="text">
				<p class="help-block">Auto Generate</p>
			  </div>
			</div>
			</div>
		
			<!-- Text input-->
			<div class="col-sm-4">
			<div class="control-group">
			  <label class="control-label" for="Ticket_Create_Time">Time</label>
			  <div class="controls">
				<input id="Ticket_Create_Time" name="Ticket_Create_Time" value="<? echo $row1['Ticket_Create_Time']; ?>" placeholder="" class="form-control input-lg" type="text">
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
				<input id="$Ticket_title" name="Ticket_title" value="<? echo $row1['Ticket_title']; ; ?>" placeholder="" class="form-control input-lg" type="text">
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
				<input id="Location_Room_No" name="Location_Room_No" placeholder="" class="form-control input-lg" type="text" value="<? echo $row1['Location_Room_No']; ?>">
		
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
				<textarea class="form-control input-lg" rows="3" id="Service_Description" name="Service_Description"><? echo $row1['Service_Description']; ?></textarea>
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
				 <? while($row3 = mysql_fetch_array($Real_Name_List)){ ?>
				  		<option <? if( $row3['Username']== $row1['Engineer_Name']) echo "selected"; ?>><? echo $row3['Username']; ?></option>
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
					<? while($row7 = mysql_fetch_array($Category_List)){ ?>
		
							<option <? if( $row7['Name']== $row1['Ticket_Category']) echo "selected"; ?> ><? echo $row7['Name']; ?></option>
					 	<? } ?>
				</select>
			  </div>
			</div></div>
		
		
			</div><!-- ROW END -->
		
			
			<div class="row">
			<!-- Text input-->
			<div class="col-md-12">
				<div class="control-group">
					<label class="control-label"></label>
				<div class="controls">
					<button type="submit" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-refresh"></span> Update</button>
					
				
					</div></div></div>
			
			
				</div><!-- ROW END -->
		
		
			</form>

		

</div></div>
	 </div>
	 <!-- /.container -->


	<!-- Load JS here for greater good =============================-->
	<script src="js/bootstrap.js"></script>
	<script src="js/bootstrap.min.js"></script>




</body>
</html>