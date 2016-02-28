<?

include 'connect.php';

if (isset($_GET['pageno'])) {
   $pageno = $_GET['pageno'];
} else {
   $pageno = 1;
} // if

$query = "SELECT count(*) FROM tickets_entry";
$result = mysql_query($query, $db) or trigger_error("SQL", E_USER_ERROR);
$query_data = mysql_fetch_row($result);
$numrows = $query_data[0];

echo $numrows;

?>