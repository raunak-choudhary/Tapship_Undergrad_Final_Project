<?php
error_reporting(0);
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "tapship";

//Create Connection
$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($con->connect_error);

if (isset($_POST["submit"])) {
    $user_name = $_POST['user_name'];
    $user_mobile = $_POST['user_mobile'];
    $user_email = $_POST['user_email'];
    $user_address = $_POST['user_address'];
    $user_subject = $_POST['user_subject'];
    $user_message = $_POST['user_message'];

    $query = "INSERT into contactus(u_name,u_mobile,u_email,u_address,u_subject,u_message,u_date) VALUES('$user_name','$user_mobile','$user_email','$user_address','$user_subject','$user_message',NOW())";
    $success = $con->query($query);
    if ($success) {
        echo "<script type='text/javascript'>alert('Message sent Successfully!');location.replace('index.php');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Error in sending message!!! Please try again.'); location.replace('contact.php');</script>";
    }
}

$con->close();

?>

<!-- <html>
</html> -->