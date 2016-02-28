<?php
include('connect.php');
$per_page = 10; 
if($_GET)
{
	$page=$_GET['page'];
}

//getting table contents
$start = ($page-1)*$per_page;
$sql = "select * from tickets_entry order by id DESC limit $start,$per_page";
$rsd = mysql_query($sql);
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

					<? while($row = mysql_fetch_array($rsd)){ ?>
								<tr id="row_<? echo $row['id']; ?>">
								<td><? echo $row['id']; ?></td>
								<td><a href="<? echo 'view-ticket.php?id=' . $row['id'] . ''; ?>"><? echo $row['Ticket_title']; ?></a> <br><small>in <? echo $row['Ticket_Category']; ?></small></td>
								<td><h5><? echo $row['Service_Description']; ?></h5></td>
								<td><? echo $row['Engineer_Name']; ?></td>

								<?
								$eng_email = mysql_query("select Email from users where Real_Name = '". $row['Engineer_Name'] ."'");
								$row13 = mysql_fetch_array($eng_email);

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
									<a  class='btn btn-default btn-xs' href="mailto:<? echo $row13['Email']; ?>?Subject=[STS] <? echo $msgx; ?>&body=<? echo $msgbody; ?>" target="_top"><span class="glyphicon glyphicon-send"></span></a>



									<a class='btn btn-default btn-xs' title="Edit" href="<? echo 'edit-ticket.php?id=' . $row['id'] . ''; ?>"><span class="glyphicon glyphicon-edit"></span></a> 
									<a class='btn btn-default btn-xs' title="Print" href="<? echo 'pdf.php?id=' . $row['id'] . ''; ?>"><span class="glyphicon glyphicon-print"></span></a> 
									<a href="#" id="<?php echo $row['id']; ?>" class="btn btn-default btn-xs delete_button" title="Click To Delete"><span class="glyphicon glyphicon-remove"></span></a>
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

