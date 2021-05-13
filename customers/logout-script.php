<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$c_mobile = $res;
error_reporting(0);

 $con = mysqli_connect("remotemysql.com", "m1t7Rrl6v7", "gIP1i7Re2y", "m1t7Rrl6v7");
$query = "UPDATE customer SET c_tsv_otp='', c_tsv_validity='', c_av_otp='' where c_mobile = $c_mobile";
$result = mysqli_query($con,$query);
session_start();
if(session_destroy()) // Destroying All Sessions {
header("Location: ../index.php"); // Redirecting To Home Page
?>