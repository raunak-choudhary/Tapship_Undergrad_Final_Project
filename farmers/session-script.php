<?php
error_reporting(0);
// mysqli_connect() function opens a new connection to the MySQL server.
 $con = mysqli_connect("remotemysql.com", "m1t7Rrl6v7", "gIP1i7Re2y", "m1t7Rrl6v7");
session_start();// Starting Session
// Storing Session
$user_check = $_SESSION['login_farmer'];
// SQL Query To Fetch Complete Information Of User
$query = "SELECT f_mobile from farmer where f_mobile = '$user_check'";
$ses_sql = mysqli_query($con, $query);
 $res = mysqli_fetch_assoc($ses_sql);
$login_session =  $res['f_mobile'];
?>