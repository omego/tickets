<? 
include 'header.php';
include 'connect.php';




$member_id = $_GET['id'];

$member_id_tickets = mysql_query("select * from users where id = $member_id");

$row1 = mysql_fetch_array($member_id_tickets); 


$Engineer_ID = $row1['Real_Name'];


$results = mysql_query("select * from tickets_entry where Engineer_Name = '". $row1['Real_Name'] ."' order by id DESC");


 ?>

<script type="text/javascript">

$(function() {
$(".delete_button").click(function() {
var id = $(this).attr("id");
var dataString = 'id='+ id ;
var parent = $(this).parent();

if(confirm("Are you sure you want to delete this ticket?"))
{

$.ajax({
type: "POST",
url: "delete.php",
data: dataString,
cache: false,


success: function()
{
$("#row_" + id).css("background-color", "#ff0000");
$("#row_" + id).fadeOut('slow', function() {$("#row_" + id).remove();});
}
});

}

return false;
});
});</script>
<div class="container">
<div class="row">


		  <div class="col-md-12">

<? include 'user-stats.php'; ?>

			<div class="row">
			  <div class="col-md-12">

				<div class="panel panel-default">
				  <!-- Default panel contents -->
				  <div class="panel-heading"><span class="glyphicon glyphicon-th-list"></span> <? echo $Engineer_ID; ?> Recent Tickets</div>

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
								<tr id="row_<? echo $row['id']; ?>">
								<td><? echo $row['id']; ?></td>
								<td><a href="<? echo 'view-ticket.php?id=' . $row['id'] . ''; ?>"><? echo $row['Ticket_title']; ?></a> <br><small>in <? echo $row['Ticket_Category']; ?></small></td>
								<td><h5><? echo $row['Service_Description']; ?></h5></td>
								<td><? echo $row['Engineer_Name']; ?></td>
								<td class="text-center">
									<a class='btn btn-default btn-xs' title="Print" href="<? echo 'pdf.php?id=' . $row['id'] . ''; ?>"><span class="glyphicon glyphicon-print"></span></a>

										

											<? if ($row['Ratings_Score'] == null){ 
											?>
											
											<?
											 }
											else{?>
												<span class='btn btn-default btn-xs' title="ratings"><?
												echo $row['Ratings_Score'];?>
												</span><?
											};

											 ?>

											

										
								  							

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
		  </div>
		</div>	</div>

