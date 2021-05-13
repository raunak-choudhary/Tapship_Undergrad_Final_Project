<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$c_mobile = $res;
if (!isset($_SESSION['login_customer'])) {
    header("location: login.php"); // Redirecting To Profile Page
}

$con = mysqli_connect("localhost", "root", "", "tapship");
$cb_id = $con->real_escape_string($_POST['id']);
$cb_bidprice = $con->real_escape_string($_POST['bid']);
$cr_mep = $con->real_escape_string($_POST['mep']);

if ($cb_bidprice < $cr_mep) {
    header("location: editbid.php?id=$cb_id");
} else {
    $query = " update cropbid set cb_bidprice=$cb_bidprice where cb_id=$cb_id";
    echo $query;
    $result = mysqli_query($con, $query);

    header("location: viewbiddetails.php?cb_id=$cb_id");
}

?>

<!-- <html>
</html> -->