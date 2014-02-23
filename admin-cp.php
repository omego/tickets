<? $results = mysql_query("select * from tickets_entry"); ?>
<? include 'new-ticket.php'; ?>
<div class="row">
		<div class="col-sm-3">
			<div class="hero-widget well well-sm">
				<div class="icon">
					 <i class="glyphicon glyphicon-inbox"></i>
				</div>
				<div class="text">
					<var>100</var>
					<label class="text-muted">Total Tickets</label>
				</div>
				
			</div>
		</div>
		<div class="col-sm-3">
			<div class="hero-widget well well-sm">
				<div class="icon">
					 <i class="glyphicon glyphicon-star"></i>
				</div>
				<div class="text">
					<var>4</var>
					<label class="text-muted">Total Engineers</label>
				</div>

			</div>
		</div>
		<div class="col-sm-3">
			<div class="hero-widget well well-sm">
				<div class="icon">
					 <i class="glyphicon glyphicon-tags"></i>
				</div>
				<div class="text">
					<var>25</var>
					<label class="text-muted">Uncompleted Tickets</label>
				</div>

			</div>
		</div>
		<div class="col-sm-3">
			<div class="hero-widget well well-sm">
				<div class="icon">
					 <i class="glyphicon glyphicon-stats"></i>
				</div>
				<div class="text">
					<var>75%</var>
					<label class="text-muted">Tickets Completed</label>
				</div>

			</div>
		</div>
	</div>

<div class="row">

			<div class="col-md-12">

			<div class="panel panel-default">
			  <div class="panel-body">


				<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#testmod">
				  Launch demo modal
				</button>
			  </div>
			</div></div>


		  <div class="col-md-12">



			<div class="row">
			  <div class="col-md-12">

				<div class="panel panel-default">
				  <!-- Default panel contents -->
				  <div class="panel-heading">Panel heading</div>

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
							<tr>
								<td><? echo $row['id']; ?></td>
								<td><a href="<? echo 'view-ticket.php?id=' . $row['id'] . ''; ?>"><? echo $row['Ticket_title']; ?></a> <br><small>in <? echo $row['Ticket_Category']; ?></small></td>
								<td><h5><? echo $row['Service_Description']; ?></h5></td>
								<td><? echo $row['Engineer_Name']; ?></td>
								<td class="text-center">
									<a class='btn btn-default btn-xs' title="Edit" href="<? echo 'edit-ticket.php?id=' . $row['id'] . ''; ?>"><span class="glyphicon glyphicon-edit"></span></a> 
									<a class='btn btn-default btn-xs' title="Print" href="<? echo 'pdf.php?id=' . $row['id'] . ''; ?>"><span class="glyphicon glyphicon-print"></span></a> 
									<a href="#" class="btn btn-default btn-xs" title="Delete"><span class="glyphicon glyphicon-remove"></span> </a></td>
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
		  </div>
		</div>

