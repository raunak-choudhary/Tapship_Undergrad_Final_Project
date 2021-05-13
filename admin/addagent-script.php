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
$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($con->connect_error);

if (isset($_POST["submit"])) {
    #retrieve file title
    $kiosk_pincode = $con->real_escape_string($_POST['kiosk_pincode']);
    $kiosk_district = $con->real_escape_string($_POST['kiosk_district']);
    $kiosk_state = $con->real_escape_string($_POST['kiosk_state']);
    $kiosk_mobile = $con->real_escape_string($_POST['kiosk_mobile']);
    $kiosk_name = $con->real_escape_string($_POST['kiosk_name']);
    $kiosk_gender = $con->real_escape_string($_POST['kiosk_gender']);
    $kiosk_age = $con->real_escape_string($_POST['kiosk_age']);
    $kiosk_address = $con->real_escape_string($_POST['kiosk_address']);
    $kiosk_aadhar = $con->real_escape_string($_POST['kiosk_aadhar']);


    $sql = "Select * from kiosk";
    $result = $con->query($sql);

    if (mysqli_num_rows($result) > 0) {
        while ($res = mysqli_fetch_assoc($result)) {
            if ($res["k_mobile"] == $kiosk_mobile) {
                header("location: agentalreadyregistered.php");
            } else {
                #file name with a random number so that similar dont get replaced
                $kiosk_aadharpdf = $kiosk_mobile . "-" . $kiosk_name . "-" . $_FILES["kiosk_aadharpdf"]["name"];
                $kiosk_photo = $kiosk_mobile . "-" . $kiosk_name . "-" . $_FILES["kiosk_photo"]["name"];

                #temporary file name to store file
                $tname1 = $_FILES["kiosk_aadharpdf"]["tmp_name"];
                $tname2 = $_FILES["kiosk_photo"]["tmp_name"];

                #target path
                $target_path1 = "assets/documents/aadhar/" . $kiosk_aadharpdf;
                $target_path2 = "assets/documents/photo/" . $kiosk_photo;

                #TO move the uploaded file to specific location
                move_uploaded_file($tname1, $target_path1);
                move_uploaded_file($tname2, $target_path2);

                #sql query to insert into database
                $query = "INSERT into kiosk(k_pincode,k_district,k_state,k_name,k_mobile,k_gender,k_age,k_aadhar,k_aadharpdf,k_address,k_photo) VALUES('$kiosk_pincode','$kiosk_district','$kiosk_state','$kiosk_name','$kiosk_mobile','$kiosk_gender','$kiosk_age','$kiosk_aadhar','$target_path1','$kiosk_address','$target_path2')";
                $success = $con->query($query);
                echo "<script type='text/javascript'>location.replace('kioskdetails.php');</script>";
            }
        }
    }
}

$con->close();

?>