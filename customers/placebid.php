<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$c_mobile= $res;
if(!isset($_SESSION['login_customer'])){
header("location: login.php"); // Redirecting To Profile Page
}
error_reporting(0);

include('viewcrop.php');


 $con = mysqli_connect("localhost", "root", "", "tapship");

$cr_id = $_GET['cr_id'];

$query = "SELECT f.f_mobile
FROM cropsale cs, farmer f where f.f_mobile=cs.cr_f_mobile AND cs.cr_id=$cr_id";

$result = mysqli_query($con,$query);

while( $res=mysqli_fetch_assoc($result))
{
   $f_mobile =  $res['f_mobile'];
}

if (isset($_POST["submit"]))
 {
                #retrieve file title
                $cropbid_bidprice =  $con->real_escape_string($_POST['cropbid_bidprice']);
                $crop_mep =  $con->real_escape_string($_POST['mep']);
                $cropbid_status = 0;
                $cropbid_paytype = 0;
                $cropbid_tid = 0;
                $cropbid_tproof = 0;

                if($cropbid_bidprice < $crop_mep){
                      echo "<script type='text/javascript'>$('#meperror').html('<p>Please Enter Bid Price more than or equal to Minimum Expected Price (MEP)</p>');</script>";
                }

                else {
                    $query = "INSERT into cropbid(cb_c_mobile, cb_f_mobile, cb_cr_id, cb_bidprice, cb_status, cb_paytype, cb_tid, cb_tproof) VALUES('$c_mobile', '$f_mobile', '$cr_id', '$cropbid_bidprice','$cropbid_status','$cropbid_paytype','$cropbid_tid','$cropbid_tproof')";
                    $con->query($query);

                    $q = "UPDATE cropsale set cr_status='1' where cr_id=$cr_id";
                    $con->query($q);
                    echo "<script type='text/javascript'>location.replace('youractivebids.php');</script>";
                  
                }
}
 
$con->close();
 
?>
