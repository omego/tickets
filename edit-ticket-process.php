<?

include 'connect.php';

$update_id = $_POST['id_id'];

$Report_No = $_POST['Report_No'];
$Ticket_Create_Date = $_POST['Ticket_Create_Date'];
$Ticket_Create_Time = $_POST['Ticket_Create_Time'];

$Ticket_title = $_POST['Ticket_title']; 

$Location_Building = $_POST['Location_Building'];
$Location_Room_No = $_POST['Location_Room_No'];
$Location_Floor = $_POST['Location_Floor'];

$Service_Description = $_POST['Service_Description'];

$Engineer_Name = $_POST['Engineer_Name'];
$Ticket_Category = $_POST['Ticket_Category'];


mysql_query("UPDATE tickets_entry
 SET
Report_No = '".$Report_No."', Ticket_Create_Date = '".$Ticket_Create_Date."', Ticket_Create_Time = '".$Ticket_Create_Time."', Ticket_title = '".$Ticket_title."', Location_Building = '".$Location_Building."', Location_Room_No = '".$Location_Room_No."', Location_Floor = '".$Location_Floor."', Service_Description = '".$Service_Description."', Engineer_Name = '".$Engineer_Name."', Ticket_Category = '".$Ticket_Category."' WHERE id = '".$update_id."'")
 or die(mysql_error());

?>