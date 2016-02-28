<? 
include 'header.php';
include 'connect.php';

//$profile_id = $_GET['id'];

$member_id_profile = mysql_query("select * from users where Username = '".$_SESSION['Username']."'");

$row1001 = mysql_fetch_array($member_id_profile); 

//$user_info_list = mysql_query("select * from users where Real_Name = '" . $_SESSION['Username'] . "'");
//$row151 = mysql_fetch_array($user_info_list);

$password = $_POST['Password'];

$encrypted_password = md5($password);

mysql_query("UPDATE users
 SET
Password = '".$encrypted_password."' WHERE id = '".$row1001['id']."'")
 or die(mysql_error());

//mysql_query("UPDATE users SET Password = '".$encrypted_password."' where id = '". $$row1001['id'] ."'")  or die(mysql_error());

//ECHO $encrypted_password;
ECHO $row1001['id'];
ECHO $row1001['Password'];
//echo $profile_id;

?>