<?php
include 'helpzone.php';
include('session-script.php');
$res = $_SESSION["sessionid"];
$d_mobile = $res;
if (!isset($_SESSION['login_driver'])) {
    header("location: login.php"); // Redirecting To Profile Page
}
//Create Connection
 $con = mysqli_connect("remotemysql.com", "m1t7Rrl6v7", "gIP1i7Re2y", "m1t7Rrl6v7");
if (!$con) {
    die(" Connection Error ");
}


if (isset($_POST["submit"])) {
    $driver_subject = $_POST['driver_subject'];
    $driver_message = $_POST['driver_message'];
    $type = "Driver";
    date_default_timezone_set("Asia/Calcutta");
    $driver_date =  date("Y-m-d");
    $driver_time = date("h:i A");

    $query = "INSERT into queries(q_subject,q_message,q_by_type,q_mobile_no,q_date,q_time,q_status) VALUES('$driver_subject','$driver_message','$type','$d_mobile','$driver_date','$driver_time','0')";
    $success = $con->query($query);
    if ($success) {
        echo "<script type='text/javascript'>
        $('#mysuccessModal').modal('show');
        function pagesuccessRedirect() {
            location.replace('index.php');
        }</script>";
    } else {
        echo "<script type='text/javascript'>
        $('#myunsuccessModal').modal('show');
        function pageunsuccessRedirect() {
            location.replace('helpzone.php');
        }</script>";
    }
}

$con->close();

?>
<!-- <html>
</html> -->