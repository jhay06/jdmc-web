<?php
include('connection.php');
session_start();
$user_check = $_SESSION['login_user']; // Storing Session
$ses_sql=mysqli_query($conn, "SELECT * FROM tbl_userinformation where Username = '$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['Username'];
if(!isset($login_session)){
	mysqli_close($connection);
	header('Location: login.php');
}
?>