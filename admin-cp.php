<? 

$results = mysql_query("select * from tickets_entry"); 

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
});

</script>




<? include 'admin-stats.php'; ?>



<div class="row">

			<div class="col-md-12">

			<div class="panel panel-default">
			  <div class="panel-body">


				<a class="btn btn-primary btn-lg" href="new-ticket.php">
				  Create New Ticket
				</a>
				<a class="btn btn-primary btn-lg" href="reports.php">
				  Reports
				</a>
			  </div>
			</div></div>


		  <div class="col-md-12">
 <div id="content" >
	 <? include 'page.php'; ?>
		 
	 </div>

	</div> 


			
		  </div>
		</div>

