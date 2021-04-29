<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$c_mobile= $res;
if(!isset($_SESSION['login_customer'])){
header("location: login.php"); // Redirecting To Profile Page
}
error_reporting(0);


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
                $crop_mep =  $con->real_escape_string($_POST['mep']);
                $cropbid_status = 0;
                $cropbid_paytype = 0;
                $cropbid_tid = 0;
                $cropbid_tproof = 0;
               
                if($cropbid_bidprice > $crop_mep){
                $query = "INSERT into cropbid(cb_c_mobile, cb_f_mobile, cb_cr_id, cb_bidprice, cb_status, cb_paytype, cb_tid, cb_tproof) VALUES('$c_mobile', '$f_mobile', '$cr_id', '$cropbid_bidprice','$cropbid_status','$cropbid_paytype','$cropbid_tid','$cropbid_tproof')";
                $con->query($query);

                $q = "UPDATE cropsale set cr_status='1' where cr_id=$cr_id";
                $con->query($q);


                header("location: youractivebids.php");
                }

                else{
                  header("location: viewcrop.php?cr_id=$cr_id");
                }
                

}
 
$con->close();
 
?>
