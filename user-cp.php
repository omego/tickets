<? 

$results = mysql_query("select * from tickets_entry where Engineer_Name = '". $_SESSION['Username'] ."'");


 ?>

<div class="row">

			<div class="col-md-12">

			<div class="panel panel-default">
			  <div class="panel-body">


				
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
				  								<td class="text-center"><a class='btn btn-info btn-xs' title="Print" href="<? echo 'pdf.php?id=' . $row['id'] . ''; ?>"><span class="glyphicon glyphicon-print"></span></a> <a href="#" class="btn btn-danger btn-xs" title="Delete"><span class="glyphicon glyphicon-remove"></span> </a></td>
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

