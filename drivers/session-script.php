<?php
error_reporting(0);
// mysqli_connect() function opens a new connection to the MySQL server.
$conn = mysqli_connect("127.0.0.1", "root", "", "tapship");
session_start();// Starting Session
// Storing Session
$user_check = $_SESSION['login_driver'];
// SQL Query To Fetch Complete Information Of User
$query = "SELECT d_mobile from driver where d_mobile = '$user_check'";
$ses_sql = mysqli_query($conn, $query);
 $res = mysqli_fetch_assoc($ses_sql);
$login_session =  $res['d_mobile'];
?>