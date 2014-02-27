<? $results = mysql_query("select * from tickets_entry"); ?>

	
<!-- Table -->
				  <table class="table table-striped">
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
								<tr id="row_<? echo $row22['id']; ?>">
								<td><? echo $row22['id']; ?></td>
								<td><a href="<? echo 'view-ticket.php?id=' . $row22['id'] . ''; ?>"><? echo $row22['Ticket_title']; ?></a> <br><small>in <? echo $row22['Ticket_Category']; ?></small></td>
								<td><h5><? echo $row22['Service_Description']; ?></h5></td>
								<td><? echo $row22['Engineer_Name']; ?></td>
								<td class="text-center">
									<a class='btn btn-default btn-xs' title="Edit" href="<? echo 'edit-ticket.php?id=' . $row22['id'] . ''; ?>"><span class="glyphicon glyphicon-edit"></span></a> 
									<a class='btn btn-default btn-xs' title="Print" href="<? echo 'pdf.php?id=' . $row22['id'] . ''; ?>"><span class="glyphicon glyphicon-print"></span></a> 
									<a href="#" id="<?php echo $row22['id']; ?>" class="btn btn-default btn-xs delete_button" title="Click To Delete"><span class="glyphicon glyphicon-remove"></span></a>
								</td>
								<td class="text-center"> 
								  								<?
								  								 if ($row22['Ticket_Status'] == "Completed"){

									  								 ?>
									  								 <span class="label label-success">
									  								 <?

									  								 echo $row22['Ticket_Status'];
								  								 }elseif ($row22['Ticket_Status'] == "Pending"){
									  								 ?>
									  								 <span class="label label-warning">
									  								 <?

									  								 echo $row22['Ticket_Status'];
								  								 }elseif ($row22['Ticket_Status'] == "Incompleted"){
									  								 ?>
									  								 <span class="label label-danger">
									  								 <?

									  								 echo $row22['Ticket_Status'];
								  								 }elseif ($row22['Ticket_Status'] == "Temporary Fix"){
									  								 ?>
									  								 <span class="label label-info">
									  								 <?

									  								 echo $row22['Ticket_Status'];
								  								 }


								  								 ?>

								  								</span> </td>
							</tr>

<? } ?>
				  </table>