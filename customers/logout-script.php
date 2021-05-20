<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$c_mobile = $res;
error_reporting(0);

 $con = mysqli_connect("localhost", "root", "", "tapship");
$query = "UPDATE customer SET c_tsv_otp='', c_tsv_validity='' where c_mobile = '$c_mobile'";
$result = mysqli_query($con,$query);
session_start();
if(session_destroy()) // Destroying All Sessions {
header("Location: ../index.php"); // Redirecting To Home Page
?>