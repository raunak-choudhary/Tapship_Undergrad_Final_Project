<?php
include('session-script.php');
$res = $_SESSION["sessionid"];
$f_mobile = $res;
error_reporting(0);

 $con = mysqli_connect("remotemysql.com", "m1t7Rrl6v7", "gIP1i7Re2y", "m1t7Rrl6v7");
$query = "UPDATE farmer SET f_tsv_otp='', f_tsv_validity='', f_av_otp='' where f_mobile = $f_mobile";
$result = mysqli_query($con,$query);

session_start();
if(session_destroy()) // Destroying All Sessions {
header("Location: ../index.php"); // Redirecting To Home Page
?>