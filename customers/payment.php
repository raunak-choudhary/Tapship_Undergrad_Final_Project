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
if (isset($_POST["submit"]))
 {
                $cropbid_paytype =  $con->real_escape_string($_POST['cropbid_paytype']);
                $cropbid_tid =  $con->real_escape_string($_POST['cropbid_tid']);

                $cropbid_tproof= $customer_mobile."-".$customer_name."-".$_FILES["cropbid_tproof"]["name"];
                $tname1 = $_FILES["cropbid_tproof"]["tmp_name"];
                $target_path1 = "assets/documents/payment/".$cropbid_tproof;
                move_uploaded_file($tname1, $target_path1);

                echo $target_path1;
                echo $cropbid_paytype;
                echo $cropbid_tid;
                echo 'Hello';
                
                $query = "INSERT into cropbid(cb_paytype, cb_tid, cb_tproof) VALUES('$cropbid_paytype', '$cropbid_tid', '$target_path1')";
                $con->query($query);

                echo $query;

                //$q = "UPDATE cropbid set cb_status='3' where cb_id=$cb_id";
                //$con->query($q);


                //header("location: yourbids.php");
}
 
$con->close();
 
?>
