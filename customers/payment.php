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
/*$query = "SELECT f.f_mobile
FROM cropsale CS, farmer f where f.f_mobile=CS.cr_f_mobile";

$result = mysqli_query($con,$query);

while( $res=mysqli_fetch_assoc($result))
{
   $f_mobile =  $res['f_mobile'];
}*/

if (isset($_POST["submit"]))
 {
                #retrieve file title
                $cropbid_paytype =  $con->real_escape_string($_POST['cropbid_paytype']);
                $cropbid_tid =  $con->real_escape_string($_POST['tid']);

                $cropbid_tproof= $customer_mobile."-".$customer_name."-".$_FILES["cropbid_tproof"]["name"];
                $tname1 = $_FILES["cropbid_tproof"]["tmp_name"];
                $target_path1 = "assets/documents/aadhar/".$cropbid_tproof;
                move_uploaded_file($tname1, $target_path1);
                
                $query = "INSERT into cropbid(cb_paytype, cb_tid, cb_tproof) VALUES('$cropbid_paytype', '$cropbid_tid', '$cropbid_tproof')";
                $con->query($query);

                $q = "UPDATE cropbid set cb_status='2' where cb_id=$cb_id";
                $con->query($q);


                header("location: yourbids.php");
}
 
$con->close();
 
?>
