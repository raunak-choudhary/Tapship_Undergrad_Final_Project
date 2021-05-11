<?php
include('session-script.php');
$res = $_SESSION["sessionid"];
$f_mobile = $res;
error_reporting(0);

$con = mysqli_connect("localhost", "root", "", "tapship");
$query = "UPDATE farmer SET f_tsv_validity=0, f_av_status='INACTIVE' where f_mobile = $f_mobile";
$result = mysqli_query($con,$query);

session_start();
if(session_destroy()) // Destroying All Sessions {
header("Location: ../index.php"); // Redirecting To Home Page
?>