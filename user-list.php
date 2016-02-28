<? 
include 'header.php';
include 'connect.php';




//$member_id = $_GET['id'];

$member_id_tickets = mysql_query("select * from users");

//$row1 = mysql_fetch_array($member_id_tickets); 


//$Engineer_ID = $row1['Real_Name'];


//$results = mysql_query("select * from tickets_entry where Engineer_Name = '". $row1['Real_Name'] ."' order by id DESC");


 ?>
<div class="container">
<div class="row">


		  <div class="col-md-12">

			<div class="row">
			  <div class="col-md-12">

				<div class="panel panel-default">
				  <!-- Default panel contents -->
				  <div class="panel-heading"><span class="glyphicon glyphicon-th-list"></span> User list</div>

				  <!-- Table -->
				  <table class="table table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Title</th>
							<th class="text-center">Total tickets</th>
							<th class="text-center">Uncompleted tickets</th>
							<th class="text-center">Avg. Ratings</th>
						</tr>
					</thead>

					<? while($row1 = mysql_fetch_array($member_id_tickets)){ ?>
					<?
					$ticketsCount = mysql_query( "SELECT * FROM tickets_entry where Engineer_Name = '". $row1['Real_Name'] ."'" ) or die("SELECT Error: ".mysql_error());
					$numRows = mysql_num_rows($ticketsCount);
					?>
								<td><? echo $row1['id']; ?></td>
								<td><? echo $row1['Real_Name']; ?></td>
								<td><? echo $row1['Title']; ?></td>
								<td class="text-center"><? echo $numRows; ?></td>
								<td class="text-center"><? echo $row1['Real_Name']; ?></td>
								<td class="text-center"><? echo $row1['Real_Name']; ?></td>
							</tr>

<? } ?>
				  </table>
				</div>



			 	   </div>







			  	   </div>
			</div>
		  </div>
		</div>	</div>

