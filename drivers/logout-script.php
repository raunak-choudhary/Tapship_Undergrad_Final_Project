<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$d_mobile = $res;
error_reporting(0);

 $con = mysqli_connect("localhost", "root", "", "tapship");
$query = "UPDATE driver SET d_tsv_otp='', d_tsv_validity='' where d_mobile = '$d_mobile'";
$result = mysqli_query($con,$query);
session_start();
if(session_destroy()) // Destroying All Sessions {
header("Location: ../index.php"); // Redirecting To Home Page
?>