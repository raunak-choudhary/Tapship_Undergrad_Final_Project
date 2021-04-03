<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$c_mobile= $res;
if(!isset($_SESSION['login_customer'])){
header("location: login.php"); // Redirecting To Profile Page
}
//error_reporting(0);


$con=mysqli_connect("localhost","root","","tapship");

$cb_id = $_GET['cb_id'];
$q = "SELECT cb_cr_id FROM cropbid where cb_id=$cb_id";
$result = mysqli_query($con,$q);

while( $res=mysqli_fetch_assoc($result))
{
   $cr_id = $res['cb_cr_id'];
}
if (isset($_POST["submit"]))
 {
                $cropbid_transporttype =  $con->real_escape_string($_POST['cropbid_transporttype']);

                $q1 = "UPDATE cropbid set cb_status='5', cb_transporttype=$cropbid_transporttype where cb_id=$cb_id";
                $con->query($q1);

                $q2 = "UPDATE cropsale set cr_status='5' where cr_id=$cr_id";
                $con->query($q2);
                
                //header("location: acceptedbids.php");
}
 
$con->close();
 
?>
