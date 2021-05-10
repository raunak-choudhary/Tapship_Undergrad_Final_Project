<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$d_mobile= $res;
if(!isset($_SESSION['login_driver'])){
header("location: login.php"); // Redirecting To Profile Page
}
error_reporting(0);

$con=mysqli_connect("localhost","root","","tapship");

$cr_id = $_GET['cr_id'];

$query = "SELECT cb.cb_id FROM cropsale cs, farmer f, customer c, cropbid cb where f.f_mobile=cs.cr_f_mobile AND c.c_mobile=cb.cb_c_mobile AND cb.cb_cr_id=cs.cr_id AND cs.cr_id=$cr_id and cb.cb_transporttype!=0";
echo $query;

$result = mysqli_query($con,$query);

while( $res=mysqli_fetch_assoc($result))
{
   $cb_id =  $res['cb_id'];
}

if (isset($_POST["submit"]))
 {
                #retrieve file title
                $tb_bid =  $con->real_escape_string($_POST['tb_bid']);
                $tb_status = 0;
               
                $query = "INSERT into transportbid(tb_d_mobile, tb_cb_id, tb_bid, tb_status) VALUES('$d_mobile', '$cb_id', '$tb_bid','$tb_status')";
                $con->query($query);

                $q = "UPDATE cropsale set cr_status='7' where cr_id=$cr_id";
                $con->query($q);

                $q1 = "UPDATE cropbid set cb_status='7' where cb_id=$cb_id";
                $con->query($q1);

                header("location: yourtransportbids.php");
}
 
$con->close();
 
?>
