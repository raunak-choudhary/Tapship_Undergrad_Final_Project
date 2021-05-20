<?php
include 'helpzone.php';
include('session-script.php');
$res = $_SESSION["sessionid"];
$f_mobile = $res;
if (!isset($_SESSION['login_farmer'])) {
    header("location: login.php"); // Redirecting To Profile Page
}

//Create Connection
 $con = mysqli_connect("localhost", "root", "", "tapship");
if (!$con) {
    die(" Connection Error ");
}


if (isset($_POST["submit"])) {
    $farmer_subject = $_POST['farmer_subject'];
    $farmer_message = $_POST['farmer_message'];
    $type = "Farmer";
    date_default_timezone_set("Asia/Calcutta");
    $farmer_date =  date("Y-m-d");
    $farmer_time = date("h:i A");

    $query = "INSERT into queries(q_subject,q_message,q_by_type,q_mobile_no,q_date,q_time,q_status) VALUES('$farmer_subject','$farmer_message','$type','$f_mobile','$farmer_date','$farmer_time','0')";
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