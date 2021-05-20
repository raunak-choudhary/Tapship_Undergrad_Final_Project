<?php
include 'helpzone.php';
include('session-script.php');
$res = $_SESSION["sessionid"];
$c_mobile = $res;
if (!isset($_SESSION['login_customer'])) {
    header("location: login.php"); // Redirecting To Profile Page
}

//Create Connection
 $con = mysqli_connect("localhost", "root", "", "tapship");
if (!$con) {
    die(" Connection Error ");
}


if (isset($_POST["submit"])) {
    $customer_subject = $_POST['customer_subject'];
    $customer_message = $_POST['customer_message'];
    $type = "Customer";
    date_default_timezone_set("Asia/Calcutta");
    $customer_date =  date("Y-m-d");
    $customer_time = date("h:i A");

    $query = "INSERT into queries(q_subject,q_message,q_by_type,q_mobile_no,q_date,q_time,q_status) VALUES('$customer_subject','$customer_message','$type','$c_mobile','$customer_date','$customer_time','0')";
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