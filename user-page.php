<?php
$profile = $row111['Real_Name'];
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
$MySQL = ' SELECT SQL_CALC_FOUND_ROWS * FROM tickets_entry WHERE Engineer_Name = "'. $profile .'" ORDER BY id DESC LIMIT ' . (($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page . '';

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

								$Description = $row['Service_Description'];
								$Description_trim = substr($Description, 0, 70);
								$trimer = $Description_trim . ' ...';
								$str = strlen($Description);
								//echo $str;
								if ($str >= 70) {
									?><td><h5><? echo $trimer; ?></h5></td><?
								}elseif ($str < 70) {
									?><td><h5><? echo $Description; ?></h5></td><?
								} ?>
								<td><? echo $row['Engineer_Name']; ?></td>

								<?


								$ticketlink = "http:/10.131.9.184:8888/tickets/view-ticket.php?id=" . $row['id'] . "/";

								$msgbody1 = 'Dear Mr. ' . $row['Engineer_Name'] . ',';
								$msgbody2 = "You have a new Support ticket in STS";
								$msgbody3 = $ticketlink;
								$msgbody4 = "%0D%0A %0D%0A Reagrds, %0D%0A COMJ IT, %0D%0A Support Tickets System";
								$msgbody = $msgbody1 . '%0D%0A %0D%0A' . $msgbody2 . '%0D%0A' . $msgbody3 . '' . $msgbody4;
								$msgx = urlencode($row['Ticket_title']);
								$strmsg = str_replace("+", " ", $msgx);
								?>


								<td class="text-center">
									<a class='btn btn-default btn-xs' title="Print" href="<? echo 'pdf.php?id=' . $row['id'] . ''; ?>"><span class="glyphicon glyphicon-print"></span></a> 
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