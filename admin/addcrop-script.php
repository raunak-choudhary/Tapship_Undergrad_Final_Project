<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$a_name = $res;
if (!isset($_SESSION['login_admin'])) {
    header("location: login.php"); // Redirecting To Profile Page
}
?>
<?php
error_reporting(0);
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "tapship";

//Create Connection
$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($con->connect_error);

if (isset($_POST["submit"])) {
    #retrieve file title
    $crop_type = $con->real_escape_string($_POST['crop_type']);
    $crop_name = $con->real_escape_string($_POST['crop_name']);
    $crop_cost = $con->real_escape_string($_POST['crop_cost']);

    $crop_msp = round($crop_cost * 1.5);
    #sql query to insert into database
    $query = "INSERT into cropdetails(cro_name,cro_type,cro_costperkg,cro_msp) VALUES('$crop_name','$crop_type','$crop_cost','$crop_msp')";
    $success = $con->query($query);
    if ($success) {
        header("location: cropdetails.php");
    } else {
        header("location: addcrop.php");
    }
}

$con->close();

?>