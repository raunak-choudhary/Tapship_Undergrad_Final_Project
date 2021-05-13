<?php
include('session-script.php');
$res = $_SESSION["sessionid"];
$f_mobile = $res;
error_reporting(0);

 $con = mysqli_connect("b3bu9bb23ikjqsiv8aku-mysql.services.clever-cloud.com", "uodltp4afruoomkk", "WAniOzDcPXxfNZTCLGnl", "b3bu9bb23ikjqsiv8aku");
$query = "UPDATE farmer SET f_tsv_otp='', f_tsv_validity='', f_av_otp='' where f_mobile = $f_mobile";
$result = mysqli_query($con,$query);

session_start();
if(session_destroy()) // Destroying All Sessions {
header("Location: ../index.php"); // Redirecting To Home Page
?>