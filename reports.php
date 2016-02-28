<? 
include 'header.php';
include 'connect.php';




$member_id = $_GET['id'];

$member_id_reports = mysql_query("select * from users");
$ticket_num_reports = mysql_query("select * from tickets_entry");



//$Engineer_ID = $row['Real_Name'];


$results = mysql_query("select * from tickets_entry where Engineer_Name = '". $row1['Real_Name'] ."' order by id DESC");
$StartDate = $_POST['StartDate'];
$EndDate = $_POST['EndDate'];
$Engineer_Name = $_POST['Engineer_Name'];

//$member_id_tickets = mysql_query("select * from users");

//$row1 = mysql_fetch_array($member_id_tickets); 


//$Engineer_ID = $row1['Real_Name'];


//$results = mysql_query("select * from tickets_entry where Engineer_Name = '". $Engineer_Name ."' AND Ticket_Create_Date >= DATE_FORMAT('" . $StartDate . "', '%d/%m/%y') AND Ticket_Create_Date <=  DATE_FORMAT('" . $EndDate . "', '%d/%m/%y')");
$resultsz = mysql_query("SELECT * FROM tickets_entry WHERE Ticket_Create_Date
BETWEEN '". $StartDate ."' AND '". $EndDate ."'
AND Engineer_Name = '". $Engineer_Name ."';
");

$numRows = mysql_num_rows($resultsz);

$stat = "Completed";

$percentCount = mysql_query("SELECT * FROM tickets_entry WHERE Ticket_Create_Date
BETWEEN '". $StartDate ."' AND '". $EndDate ."'
AND Engineer_Name = '". $Engineer_Name ."'
AND Ticket_Status = '". $stat ."';
");

$percentnumRows = mysql_num_rows($percentCount);

$Uncompleted = $numRows -  $percentnumRows;

$Uncompleted_Count = $numRows - $Uncompleted;

if ($numRows != 0) {
	$totalticketspercent = number_format((($numRows - $Uncompleted) * 100) / $numRows);
}





 ?>
<script type="text/javascript">
$(document).ready(function() { 
		$('#datepicker').datepicker({
	    startDate: "01/01/2014",
	    endDate: "31/12/2015",
	    startView: 2,
	    format: "dd/mm/yyyy",
		});

		
	});



		



	</script>

<div class="container">
	 <div class="panel panel-default visible-print">
	 <div class="panel-body">

	 		<div class="controls">
	 		<div class="control-group">
	 		<h4>Report for: <? echo $Engineer_Name; ?> from <? echo $StartDate; ?> to <? echo $EndDate; ?></h4> 

	 </div></div></div></div>

	<div class="row">

	<div class="col-sm-4">
		<div class="hero-widget well well-sm">
			<div class="icon">
				 <i class="glyphicon glyphicon-inbox hidden-print"></i>
			</div>
			<div class="text">
				<var><?echo $numRows;?></var>
				<label class="text-muted">Total Tickets</label>
			</div>
			
		</div>
	</div>
	<div class="col-sm-4">
		<div class="hero-widget well well-sm">
			<div class="icon">
				 <i class="glyphicon glyphicon-tags hidden-print"></i>
			</div>
			<div class="text">
				<var><?echo $Uncompleted;?></var>
				<label class="text-muted">Uncompleted Tickets</label>
			</div>

		</div>
	</div>
	<div class="col-sm-4">
		<div class="hero-widget well well-sm">
			<div class="icon">
				 <i class="glyphicon glyphicon-stats hidden-print"></i>
			</div>
			<div class="text">
				<var><?echo $totalticketspercent;?>%</var>
				<label class="text-muted">Tickets Completed</label>
			</div>

		</div>
	</div>
	
</div>

	 <div class="panel panel-default hidden-print">
	 <div class="panel-body">


		<form id="myForm" action="reports.php" method="post" class="form-horizontal">
		<legend>Users Report</legend>
		
		<div class="row">
		
		<!-- Text input-->
		<div class="col-sm-4">
		<div class="control-group">
		  <label class="control-label" for="Report_No">Select User</label>
		  <div class="controls">
			<select id="Engineer_Name" name="Engineer_Name" class="form-control input-lg">
				
 				<? while($row = mysql_fetch_array($member_id_reports)){ ?>
					<option <? if( $row['Real_Name']== $Engineer_Name ) echo "selected"; ?>><? echo $row['Real_Name']; ?></option>
			 	<? } ?>

			</select>
		  </div>
		</div>
		</div>



		<div class="col-sm-8">
		<div class="control-group">
		  <label class="control-label" for="Report_No">Date Range</label>
		  <div class="controls">
			<div class="input-daterange input-group" id="datepicker">
		    <input type="text" class="input-lg form-control" name="StartDate" value="<? echo $StartDate; ?>"/>
		    <span class="input-group-addon">to</span>
		    <input type="text" class="input-lg form-control" name="EndDate" value="<? echo $EndDate; ?>"/>
		</div>
		  </div>
		</div>
		</div>


</div>


<div class="row">
			<!-- Text input-->
			<div class="col-md-12">
				<div class="control-group">
					<label class="control-label"></label>
		<div class="controls">
				<button id="sub" type="submit" class="btn btn-primary hidden-print">Generate</button>
			
		
			</div></div></div>
		
		
				</div><!-- ROW END -->

</form>
</div>

</div>



</div>

