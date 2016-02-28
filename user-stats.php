<?php 
$res = mysql_query("select * from users where Username = '". $_SESSION['Username'] ."'");
$row111 = mysql_fetch_array($res);

$ticketsCount = mysql_query("select * from tickets_entry where Engineer_Name = '". $row111['Real_Name'] ."' order by id DESC");
$numRows = mysql_num_rows($ticketsCount);

//$usersCount = mysql_query( "SELECT * FROM users" ) or die("SELECT Error: ".mysql_error());
//$usersnumRows = mysql_num_rows($usersCount);

$stat = "Completed";

$percentCount = mysql_query("SELECT * FROM tickets_entry where Engineer_Name = '". $row111['Real_Name'] ."' and Ticket_Status = '". $stat ."'");

//$percentCount = mysql_query("SELECT Ticket_Status,COUNT(*) FROM tickets_entry WHERE Ticket_Status='Completed'");
$percentnumRows = mysql_num_rows($percentCount);

$Uncompleted = $numRows -  $percentnumRows;

//$totalticketspercent = number_format((($numRows - $Uncompleted) * 100) / $numRows);



?>

<div class="row">

	<div class="col-sm-4">
		<div class="hero-widget well well-sm">
			<div class="icon">
				 <i class="glyphicon glyphicon-inbox"></i>
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
				 <i class="glyphicon glyphicon-tags"></i>
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
				 <i class="glyphicon glyphicon-stats"></i>
			</div>
			<div class="text">
				<var><?echo $totalticketspercent;?>%</var>
				<label class="text-muted">Tickets Completed</label>
			</div>

		</div>
	</div>
	
</div>