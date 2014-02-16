<?php
ob_start();

include 'connect.php';

$username = $_POST['Username'];
$password = $_POST['Password'];

 $encrypted_password = md5($password);

$result = mysql_query("SELECT * FROM users WHERE Username = '$username' AND Password = '$encrypted_password'
");

if(mysql_num_rows($result))
{
  // Login
  session_start();
  $_SESSION['Username'] = htmlspecialchars($username); // htmlspecialchars() sanitises XSS // منع الحقن
  // Redirect
  header('Location: index.php');
}
else
{
  // Redirect
  header('Location: login-er.php');

}
?>