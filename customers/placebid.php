<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$c_mobile= $res;
if(!isset($_SESSION['login_customer'])){
header("location: login.php"); // Redirecting To Profile Page
}
//error_reporting(0);


$con=mysqli_connect("localhost","root","","tapship");

$cr_id = $_GET['cr_id'];
$query = "SELECT f.f_mobile
FROM cropsale CS, farmer f where f.f_mobile=CS.cr_f_mobile";

$result = mysqli_query($con,$query);

while( $res=mysqli_fetch_assoc($result))
{
   $f_mobile =  $res['f_mobile'];
}

if (isset($_POST["submit"]))
 {
                #retrieve file title
                $cropbid_bidprice =  $con->real_escape_string($_POST['cropbid_bidprice']);
                $cropbid_status = 0;
                $cropbid_transport = 0;
               
                $query = "INSERT into cropbid(cb_c_mobile, cb_f_mobile, cb_cr_id, cb_bidprice, cb_status, cb_transport) VALUES('$c_mobile', '$f_mobile', '$cr_id', '$cropbid_bidprice','$cropbid_status','$cropbid_transport')";
                $con->query($query);

                $q = "UPDATE cropsale set cr_status='1' where cr_id=$cr_id";
                $con->query($q);

                #header("location: activecrop.php");

}
 
$con->close();
 
?>
