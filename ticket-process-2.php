<?

include 'connect.php';

$update_id = $_POST['id_id'];

$Engineer_Remark = $_POST['Engineer_Remark'];
$Ticket_Status = $_POST['Ticket_Status'];
$Defects_Found = $_POST['Defects_Found'];

mysql_query("UPDATE tickets_entry
 SET
Engineer_Remark = '".$Engineer_Remark."', Ticket_Status = '".$Ticket_Status."', Defects_Found = '".$Defects_Found."' WHERE id = '".$update_id."'")
 or die(mysql_error());

?>