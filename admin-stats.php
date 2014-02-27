<?

$ticketsCount = mysql_query( "SELECT * FROM tickets_entry" ) or die("SELECT Error: ".mysql_error());
$numRows = mysql_num_rows($ticketsCount);

$usersCount = mysql_query( "SELECT * FROM users" ) or die("SELECT Error: ".mysql_error());
$usersnumRows = mysql_num_rows($usersCount);

$stat = "Completed";

$percentCount = mysql_query("SELECT * FROM tickets_entry where Ticket_Status = '". $stat ."'");

//$percentCount = mysql_query("SELECT Ticket_Status,COUNT(*) FROM tickets_entry WHERE Ticket_Status='Completed'");
$percentnumRows = mysql_num_rows($percentCount);

$totalticketspercent = $numRows - $percentnumRows * 100 / 100;

?>


<div class="row">
	<div class="col-sm-3">
		<div class="hero-widget well well-sm">
			<div class="icon">
				 <i class="glyphicon glyphicon-inbox"></i>
			</div>
			<div class="text">
				<var><?echo $percentnumRows;?></var>
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
				<var><?echo $usersnumRows;?></var>
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
				<var><?echo $totalticketspercent;?>%</var>
				<label class="text-muted">Tickets Completed</label>
			</div>

		</div>
	</div>
</div>