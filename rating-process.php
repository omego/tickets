<?

include 'connect.php';


$update_id = $_POST['id_id'];
$Ratings_Score = $_POST['Ratings_Score'];


mysql_query("UPDATE tickets_entry
 SET
Ratings_Score = '".$Ratings_Score."' WHERE id = '".$update_id."'")
 or die(mysql_error());

?>