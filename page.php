<?php

// how many records should be displayed on a page?
$records_per_page = 10;

// include the pagination class
require 'Zebra_Pagination/Zebra_Pagination.php';

// instantiate the pagination object
$pagination = new Zebra_Pagination();

// the MySQL statement to fetch the rows
// note how we build the LIMIT
// also, note the "SQL_CALC_FOUND_ROWS"
// this is to get the number of rows that would've been returned if there was no LIMIT
// see http://dev.mysql.com/doc/refman/5.0/en/information-functions.html#function_found-rows
$MySQL = '
	SELECT
		SQL_CALC_FOUND_ROWS
		*
	FROM
		tickets_entry
	ORDER BY
		id DESC
	LIMIT
		' . (($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page . '
';

// if query could not be executed
if (!($result = @mysql_query($MySQL))) {

	// stop execution and display error message
	die(mysql_error());

}

// fetch the total number of records in the table
$rows = mysql_fetch_assoc(mysql_query('SELECT FOUND_ROWS() AS rows'));

// pass the total number of records to the pagination class
$pagination->records($rows['rows']);

// records per page
$pagination->records_per_page($records_per_page);

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

					<? while($row = mysql_fetch_array($result)){ ?>
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


								$ticketlink = "http:/10.131.6.186/tickets/view-ticket.php?id=" . $row['id'] . "/";

								$msgbody1 = 'Dear Mr. ' . $row['Engineer_Name'] . ',';
								$msgbody2 = "You have a new Support ticket in STS";
								$msgbody3 = $ticketlink;
								$msgbody4 = "Floor: " . $floor . '%0D%0A' ."Room: " . $room;
								$msgbody5 = $Description;
								$msgbody6 = "%0D%0A %0D%0A Reagrds, %0D%0A COMJ IT, %0D%0A Support Tickets System";
								$msgbody = $msgbody1 . '%0D%0A %0D%0A' . $msgbody2 . '%0D%0A' . $msgbody3 . '%0D%0A %0D%0A' . $msgbody4 . '%0D%0A %0D%0A' . $msgbody5 . '' . $msgbody6;
								$msgx = $row['Ticket_title'];
								$strmsg = str_replace("+", " ", $msgx);
								?>


								<?


								$ratinglink = "http:/10.131.9.184/tickets/rating.php?id=" . $row['id'] . "/";

								$msgbody11 = 'Dear ' . $row['Requester_Name'] . ',';
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
										

											<? if ($row['Ratings_Score'] == null){ 
											?>
											<a  class='btn btn-default btn-xs' href="mailto:<? echo $row['Requester_Email']; ?>?Subject=[STS] <? echo $msgxx; ?>&body=<? echo $msgbodyx; ?>" target="_top">
											<span class="glyphicon glyphicon-star"></span>
											<?
											 }
											else{
											?>
											<a class='btn btn-default btn-xs' href='<? echo "rating.php?id=" . $row['id'] . "/"; ?>'> 
											<?
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
			</div>



<?php

// render the pagination links
$pagination->render();

?>