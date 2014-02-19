<?php

include 'header.php';
include 'connect.php';

//

$member_id = $_GET['id'];

$member_id_tickets = mysql_query("select * from tickets_entry where id = $member_id");

//

$row1 = mysql_fetch_array($member_id_tickets); 


 $Report_No = $row1['Report_No'];
 $Engineer_ID = $row1['Engineer_ID'];

echo $Engineer_ID;
echo "<BR>";

$Engineer_IDLIST = mysql_query("select Badge from users where id = $Engineer_ID");

$row2 = mysql_fetch_array($Engineer_IDLIST); 

 $Engineer_IDLIST = $row2['Badge'];

echo $Engineer_IDLIST;

?>