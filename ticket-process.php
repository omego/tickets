<?

include 'connect.php';

$Report_No = $_POST['Report_No'];
$Ticket_Create_Date = $_POST['Ticket_Create_Date'];
$Ticket_Create_Time = $_POST['Ticket_Create_Time'];

$Requester_Name = $_POST['Requester_Name'];
$Requester_Email = $_POST['Requester_Email'];

$Ticket_title_unsafe = $_POST['Ticket_title']; 

$Ticket_title = mysql_real_escape_string(strip_tags(trim($Ticket_title_unsafe)));
// this is made for Ali :@

$Location_Building = $_POST['Location_Building'];
$Location_Room_No = $_POST['Location_Room_No'];
$Location_Floor = $_POST['Location_Floor'];

$Service_Description = $_POST['Service_Description'];

$Engineer_Name = $_POST['Engineer_Name'];
$Ticket_Category = $_POST['Ticket_Category'];

$sql_1="INSERT INTO tickets_entry (Report_No, Ticket_Create_Date, Ticket_Create_Time, Requester_Name, Requester_Email, Ticket_title, Location_Building, Location_Room_No, Location_Floor, Service_Description, Engineer_Name, Ticket_Category) 
VALUES 
('$Report_No', '$Ticket_Create_Date', '$Ticket_Create_Time', '$Requester_Name', '$Requester_Email', '$Ticket_title', '$Location_Building', '$Location_Room_No', '$Location_Floor', '$Service_Description', '$Engineer_Name', '$Ticket_Category')";


if (!mysql_query($sql_1))
{
die('Error: ' . mysql_error());
}


?>