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
$con = mysqli_connect("remotemysql.com", "m1t7Rrl6v7", "gIP1i7Re2y", "m1t7Rrl6v7");

//Create Connection


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