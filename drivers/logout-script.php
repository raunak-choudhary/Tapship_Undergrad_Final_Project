<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$d_mobile = $res;
error_reporting(0);

 $con = mysqli_connect("remotemysql.com", "m1t7Rrl6v7", "gIP1i7Re2y", "m1t7Rrl6v7");
$query = "UPDATE driver SET d_tsv_otp='', d_tsv_validity='', d_av_otp='' where d_mobile = $d_mobile";
$result = mysqli_query($con,$query);
session_start();
if(session_destroy()) // Destroying All Sessions {
header("Location: ../index.php"); // Redirecting To Home Page
?>