<?php


mysql_connect("localhost", "root", "root") or die(mysql_error());
//echo "Connected to MySQL<br />";
mysql_select_db("tickets") or die(mysql_error());
mysql_query("SET NAMES 'utf8'");
mysql_query('SET CHARACTER SET utf8'); 
echo "Connected to Database";


//$con = mysqli_connect("localhost","root","root","tickets");

// Check connection
//if (mysqli_connect_errno($con))
//  {
 // echo "Failed to connect to MySQL: " . mysqli_connect_error();
 // }
?> 