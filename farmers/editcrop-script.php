<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$f_mobile = $res;
if (!isset($_SESSION['login_farmer'])) {
    header("location: login.php"); // Redirecting To Profile Page
}

$con = mysqli_connect("localhost", "root", "", "tapship");
$cr_id = $con->real_escape_string($_POST['id']);
$cr_mep = $con->real_escape_string($_POST['mep']);
$cr_quantity = $con->real_escape_string($_POST['quantity']);
$cr_msp = $con->real_escape_string($_POST['msp']);
echo $cr_msp;
$cr_final_mep_range = round($cr_msp + ($cr_msp * 0.25));
echo $cr_final_mep_range;

if ($cr_mep >= $cr_final_mep_range) {
    $cr_id = round((float)$cr_id * 525325.24 * 6537838239.89);
    $id = base64_encode($cr_id);
    header("location: editcrop.php?id=$id");
} else {
    $query = " update cropsale set cr_mep=$cr_mep, cr_quantity=$cr_quantity where cr_id=$cr_id";
    echo $query;
    $result = mysqli_query($con, $query);

    $cr_id = round((float)$cr_id * 525325.24 * 6537838239.89);
    $id = base64_encode($cr_id);

    header("location: viewcrop.php?id=$id");
}
?>
<!-- <html>
</html> -->