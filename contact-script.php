<?php
include 'contact.php';
//Create Connection
 $con = mysqli_connect("localhost", "root", "", "tapship");
if (!$con) {
    die(" Connection Error ");
}

if (isset($_POST["submit"])) {
    $user_name = $_POST['user_name'];
    $user_mobile = $_POST['user_mobile'];
    $user_email = $_POST['user_email'];
    $user_address = $_POST['user_address'];
    $user_subject = $_POST['user_subject'];
    $user_message = $_POST['user_message'];
    date_default_timezone_set("Asia/Calcutta");
    $user_date =  date("Y-m-d");
    $user_time = date("h:i A");
    $show_modal = false;

    $query = "INSERT into contactus(u_name,u_mobile,u_email,u_address,u_subject,u_message,u_date,u_time,u_status) VALUES('$user_name','$user_mobile','$user_email','$user_address','$user_subject','$user_message','$user_date','$user_time','0')";
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
            location.replace('contact.php');
        }</script>";
    }
}
?>

<!-- <html>
</html> -->