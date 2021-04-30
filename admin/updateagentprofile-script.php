<?php
include('session-script.php');
$res = $_SESSION["sessionid"];
$a_name = $res;
if (!isset($_SESSION['login_admin'])) {
    header("location: login.php"); // Redirecting To Profile Page
}
$con = mysqli_connect("localhost", "root", "", "tapship");
if (!$con) {
    die(" Connection Error ");
}


$k_mobile = $_POST['k_mobile'];
$kiosk_name = $_POST['kiosk_name'];
$kiosk_gender = $_POST['kiosk_gender'];
$kiosk_age = $_POST['kiosk_age'];
$kiosk_address = $_POST['kiosk_address'];
$kiosk_district = $_POST['kiosk_district'];
$kiosk_state = $_POST['kiosk_state'];
$kiosk_pincode = $_POST['kiosk_pincode'];
$kiosk_aadhar = $_POST['kiosk_aadhar'];


$OldData = $con->query("SELECT * FROM kiosk WHERE k_mobile='" . $k_mobile . "'")->fetch_assoc();

if ($kiosk_aadhar != $OldData['k_aadhar'] && empty($_FILES['kiosk_aadharfile'])) {
    echo '1';
} else {

    $query = "update kiosk set k_name = '" . $kiosk_name . "', k_gender = '" . $kiosk_gender . "', k_age = '" . $kiosk_age . "', k_address = '" . $kiosk_address . "', k_district = '" . $kiosk_district . "', k_state = '" . $kiosk_state . "', k_pincode = '" . $kiosk_pincode . "', k_aadhar = '" . $kiosk_aadhar . "' where k_mobile = '" . $k_mobile . "'";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo '0';

        if (!empty($_FILES['kiosk_aadharfile'])) {
            $kiosk_adhar = $k_mobile . "-" . $kiosk_name . "-" . $_FILES["kiosk_aadharfile"]["name"];
            $tmpAadhar = $_FILES["kiosk_aadharfile"]["tmp_name"];
            $dirAadhar = "assets/documents/aadhar/" . $kiosk_adhar;
            move_uploaded_file($tmpAadhar, $dirAadhar);
            $query1 = "update kiosk set k_aadharpdf = '" . $dirAadhar . "' where k_mobile = '" . $k_mobile . "'";
            $result1 = mysqli_query($con, $query1);
        }
    }
}
