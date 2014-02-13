<? 
include 'header.php'; 
include 'connect.php';

$Engineer_ID = "3";

$results = mysql_query("select * from tickets_entry");
?>





	 <div class="container">
		
		<div class="row">
			
			<div class="col-md-12">
				
			<div class="panel panel-default">
			  <div class="panel-body">
				

				<a href="new-ticket.php" class="btn btn-primary btn-lg"> <span class="glyphicon glyphicon-plus"></span> Add New Ticket</a>
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
							<th>Assigned to</th>
							<th class="text-center">Options</th>
							<th class="text-center">Status</th>
						</tr>
					</thead>
					
					<? while($row = mysql_fetch_array($results)){ ?>
							<tr>
								<td><? echo $row['id']; ?></td>
								<td><? echo $row['Service_Description']; ?></td>
								<td><? echo $row['Engineer_Name']; ?></td>
								<td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
								<td class="text-center"> <span class="label label-success">Done</span> </td>
							</tr>
							
<? } ?>
				  </table>
				</div>



		     	   </div>

			   	
		        	

		        


		      	   </div>
		    </div>
		  </div>
		</div>


	 </div>
	 <!-- /.container -->


	<!-- Load JS here for greater good =============================-->
	<script src="js/bootstrap.js"></script>
	<script src="js/bootstrap.min.js"></script>




</body>
</html>