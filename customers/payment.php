<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$c_mobile= $res;
if(!isset($_SESSION['login_customer'])){
header("location: login.php"); // Redirecting To Profile Page
}
error_reporting(0);


 $con = mysqli_connect("localhost", "root", "", "tapship");

$cb_id = $_GET['cb_id'];
$q = "SELECT cb_cr_id FROM cropbid where cb_id=$cb_id";
$result = mysqli_query($con,$q);

while( $res=mysqli_fetch_assoc($result))
{
   $cr_id = $res['cb_cr_id'];
}
if (isset($_POST["submit"]))
 {
                $cropbid_paytype =  $con->real_escape_string($_POST['cropbid_paytype']);
                $cropbid_tid =  $con->real_escape_string($_POST['cropbid_tid']);

                $cropbid_tproof= $cropbid_tid."-".$_FILES["cropbid_tproof"]["name"];
                $tname1 = $_FILES["cropbid_tproof"]["tmp_name"];
                $target_path1 = "assets/documents/payment/".$cropbid_tproof;
                move_uploaded_file($tname1, $target_path1);
                
                $query = "UPDATE cropbid set cb_paytype='$cropbid_paytype', cb_tid='$cropbid_tid', cb_tproof='$target_path1' where cb_id=$cb_id";
                $con->query($query) ;

                $q1 = "UPDATE cropbid set cb_status='3' where cb_id=$cb_id";
                $con->query($q1);

                $q2 = "UPDATE cropsale set cr_status='3' where cr_id=$cr_id";
                $con->query($q2);

                echo $q2;

                header("location: acceptedbids.php");
}
 
$con->close();
 
?>
