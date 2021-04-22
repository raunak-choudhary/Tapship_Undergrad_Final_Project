<?php
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

    $query = "INSERT into queries(q_subject,q_message,q_date,q_by_type,q_mobile_no) VALUES('$farmer_subject','$farmer_message',NOW(),'$type','$f_mobile')";
    $success = $con->query($query);
    if ($success) {
        echo "<script type='text/javascript'>alert('Message sent Successfully!');location.replace('index.php');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Error in sending message!!! Please try again.'); location.replace('helpzone.php');</script>";
    }
}

$con->close();

?>
<!-- <html>
</html> -->