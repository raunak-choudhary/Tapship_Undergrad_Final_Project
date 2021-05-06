<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$a_name = $res;
if (!isset($_SESSION['login_admin'])) {
    header("location: login.php"); // Redirecting To Profile Page
}
?>
<?php
//Create Connection
$con = mysqli_connect("localhost", "root", "", "tapship");
if (!$con) {
    die(" Connection Error ");
}

#retrieve file title
$crop_id = $_GET['cro_id'];
$crop_type = $_GET['cro_type'];
$crop_name = $_GET['cro_name'];
$crop_cost = $_POST['crop_cost'];

$crop_msp = round($crop_cost * 1.5);
#sql query to insert into database
$query = "update cropdetails set cro_name = '" . $crop_name . "', cro_type = '" . $crop_type . "', cro_costperkg = '" . $crop_cost . "', cro_msp = '" . $crop_msp . "' where cro_id = '" . $crop_id . "'";
$success = $con->query($query);
if ($success) {
    header("location: cropdetails.php");
} else {
    header("location: updatecropcost.php?cro_id= $crop_id");
}


$con->close();

?>