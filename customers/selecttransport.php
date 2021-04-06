<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$c_mobile= $res;
if(!isset($_SESSION['login_customer'])){
header("location: login.php"); // Redirecting To Profile Page
}
error_reporting(0);


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

                if($cropbid_transporttype == 1){

                  $q1 = "UPDATE cropbid set cb_status='5' where cb_id=$cb_id";
                  $con->query($q1);
  
                  $q2 = "UPDATE cropsale set cr_status='5' where cr_id=$cr_id";
                  $con->query($q2);

                  $ts_name = $con->real_escape_string($_POST['ts_name']);
                  $ts_mobile = $con->real_escape_string($_POST['ts_mobile']);
                  $ts_vehiclenumber = $con->real_escape_string($_POST['ts_vehiclenumber']);

                  $q3 = "INSERT into transportself(ts_cb_id, ts_name, ts_mobile, ts_vehiclenumber) VALUES('$cb_id', '$ts_name', '$ts_mobile', '$ts_vehiclenumber')";
                  $con->query($q3);

                  echo $q3;
                }

                if($cropbid_transporttype == 2){

                  $q1 = "UPDATE cropbid set cb_status='6' where cb_id=$cb_id";
                  $con->query($q1);

                  $q2 = "UPDATE cropsale set cr_status='6' where cr_id=$cr_id";
                  $con->query($q2);

                }

                

                header("location: acceptedbids.php");
}
 
$con->close();
 
?>
