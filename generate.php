<? 
include 'header.php';
include 'connect.php';



$StartDate = $_POST['StartDate'];
$EndDate = $_POST['EndDate'];
$Engineer_Name = $_POST['Engineer_Name'];

//$member_id_tickets = mysql_query("select * from users");

//$row1 = mysql_fetch_array($member_id_tickets); 


//$Engineer_ID = $row1['Real_Name'];


//$results = mysql_query("select * from tickets_entry where Engineer_Name = '". $Engineer_Name ."' AND Ticket_Create_Date >= DATE_FORMAT('" . $StartDate . "', '%d/%m/%y') AND Ticket_Create_Date <=  DATE_FORMAT('" . $EndDate . "', '%d/%m/%y')");
$results = mysql_query("SELECT * FROM tickets_entry WHERE Ticket_Create_Date
BETWEEN '". $StartDate ."' AND '". $EndDate ."'
AND Engineer_Name = '". $Engineer_Name ."';
");
 ?>

 <div class="row">
			  <div class="col-md-12">

				<div class="panel panel-default">
				  <!-- Default panel contents -->
				  <div class="panel-heading"><span class="glyphicon glyphicon-th-list"></span> Recent Tickets</div>

				  <!-- Table -->
				  <table class="table table-striped" id="tbl">
					<thead>
						<tr>
							<th>ID</th>
							<th>Task</th>
							<th>Service Description</th>
							<th>Assigned to</th>
							<th class="text-center">Options</th>
							<th class="text-center">Status</th>
						</tr>
					</thead>

					<? while($row = mysql_fetch_array($results)){ ?>
								<tr id="row_<? echo $row['id']; ?>">
								<td><? echo $row['id']; ?></td>
								<td><a href="<? echo 'view-ticket.php?id=' . $row['id'] . ''; ?>"><? echo $row['Ticket_title']; ?></a> <br><small>in <? echo $row['Ticket_Category']; ?></small></td>

								<?
								$eng_email = mysql_query("select * from users where Real_Name = '". $row['Engineer_Name'] ."'");
								$row13 = mysql_fetch_array($eng_email);

								$floor = $row['Location_Floor'];
								$room = $row['Location_Room_No'];

								$Description = $row['Service_Description'];
								$Description_trim = substr($Description, 0, 50);
								$trimer = $Description_trim . ' ...';
								$str = strlen($Description);
								//echo $str;
								if ($str >= 50) {
									?><td><h5><? echo $trimer; ?></h5></td><?
								}elseif ($str < 50) {
									?><td><h5><? echo $Description; ?></h5></td><?
								} ?>
								<td><a href="<? echo'user-tickets-list.php?id=' . $row13['id'] . ''; ?>"><? echo $row['Engineer_Name']; ?></a></td>

								<?


								$ticketlink = "http:/10.131.9.184:8888/tickets/view-ticket.php?id=" . $row['id'] . "/";

								$msgbody1 = 'Dear Mr. ' . $row['Engineer_Name'] . ',';
								$msgbody2 = "You have a new Support ticket in STS";
								$msgbody3 = $ticketlink;
								$msgbody4 = "Floor: " . $floor . '%0D%0A' ."Room: " . $room;
								$msgbody5 = $Description;
								$msgbody6 = "%0D%0A %0D%0A Reagrds, %0D%0A COMJ IT, %0D%0A Support Tickets System";
								$msgbody = $msgbody1 . '%0D%0A %0D%0A' . $msgbody2 . '%0D%0A' . $msgbody3 . '%0D%0A %0D%0A' . $msgbody4 . '%0D%0A %0D%0A' . $msgbody5 . '' . $msgbody6;
								$msgx = urlencode($row['Ticket_title']);
								$strmsg = str_replace("+", " ", $msgx);
								?>


								<?


								$ratinglink = "http:/10.131.9.184:8888/tickets/rating.php?id=" . $row['id'] . "/";

								$msgbody11 = 'Dear Mr. ' . $row['Requester_Name'] . ',';
								$msgbody22 = "Your Request has been completed by Mr." . $row['Engineer_Name'] . ", Please take a few seconds to rate his service.";
								$msgbody33 = $ratinglink;
								$msgbody44 = "Requeste Timestamp:";
								$msgbody55 = $row['Ticket_Create_Date'];
								$msgbody66 = "%0D%0A %0D%0A Reagrds, %0D%0A COMJ IT, %0D%0A Support Tickets System";
								$msgbodyx = $msgbody11 . '%0D%0A %0D%0A' . $msgbody22 . '%0D%0A' . $msgbody33 . '%0D%0A %0D%0A' . $msgbody44 . '%0D%0A %0D%0A' . $msgbody55 . '' . $msgbody66;
								$msgxx = "Rating Request #" . urlencode($row['Report_No']);
								$strmsgx = str_replace("+", " ", $msgxx);
								?>


								<td class="text-center">
									<a  class='btn btn-default btn-xs' href="mailto:<? echo $row13['Email']; ?>?Subject=[STS] <? echo $msgx; ?>&body=<? echo $msgbody; ?>" target="_top"><span class="glyphicon glyphicon-send"></span></a>



									<a class='btn btn-default btn-xs' title="Edit" href="<? echo 'edit-ticket.php?id=' . $row['id'] . ''; ?>"><span class="glyphicon glyphicon-edit"></span></a> 
									<a class='btn btn-default btn-xs' title="Print" href="<? echo 'pdf.php?id=' . $row['id'] . ''; ?>"><span class="glyphicon glyphicon-print"></span></a> 
									<a href="#" id="<?php echo $row['id']; ?>" class="btn btn-default btn-xs delete_button" title="Click To Delete"><span class="glyphicon glyphicon-remove"></span></a>
									<? if ($row['Ticket_Status'] == "Completed"){ ?>
										<a  class='btn btn-default btn-xs' href="mailto:<? echo $row['Requester_Email']; ?>?Subject=[STS] <? echo $msgxx; ?>&body=<? echo $msgbodyx; ?>" target="_top">

											<? if ($row['Ratings_Score'] == null){ 
											?>
											<span class="glyphicon glyphicon-star"></span>
											<?
											 }
											else{
												echo $row['Ratings_Score'];
											};

											 ?>

											

										</a>
								  								<? }; ?>
									 
								</td>
								<td class="text-center"> 
								  								<?
								  								 if ($row['Ticket_Status'] == "Completed"){

									  								 ?>
									  								 <span class="label label-success">
									  								 <?

									  								 echo $row['Ticket_Status'];
								  								 }elseif ($row['Ticket_Status'] == "Pending"){
									  								 ?>
									  								 <span class="label label-warning">
									  								 <?

									  								 echo $row['Ticket_Status'];
								  								 }elseif ($row['Ticket_Status'] == "Incompleted"){
									  								 ?>
									  								 <span class="label label-danger">
									  								 <?

									  								 echo $row['Ticket_Status'];
								  								 }elseif ($row['Ticket_Status'] == "Temporary Fix"){
									  								 ?>
									  								 <span class="label label-info">
									  								 <?

									  								 echo $row['Ticket_Status'];
								  								 }


								  								 ?>

								  								</span> </td>
							</tr>

<? } ?>
				  </table>
				</div>



			 	   </div>







			  	   </div>