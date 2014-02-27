<?php 

include 'header.php'; 
include 'connect.php'; 

include("dbconfig.php");
if($_POST['id'])
{
$id=$_POST['id'];
$id = mysql_escape_String($id);
$sql = "delete from tickets_entry where id='$id'";
mysql_query($sql);
}

?>      	
