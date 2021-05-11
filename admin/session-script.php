<?php
error_reporting(0);
// mysqli_connect() function opens a new connection to the MySQL server.
$con = mysqli_connect("localhost", "root", "", "tapship");
session_start();// Starting Session
// Storing Session
$user_check = $_SESSION['login_admin'];
// SQL Query To Fetch Complete Information Of User
$query = "SELECT a_name from admin where a_password = '$user_check'";
$ses_sql = mysqli_query($con, $query);
 $res = mysqli_fetch_assoc($ses_sql);
$login_session =  $res['a_name'];
?>