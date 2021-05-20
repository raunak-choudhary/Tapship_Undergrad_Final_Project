<?php
include 'addcrop.php';
error_reporting(0);
session_start();
$con = mysqli_connect("localhost", "root", "", "tapship");

//Create Connection

$f_mobile = $_SESSION["sessionid"];

if (isset($_POST["submit"])) {
    #retrieve file title
    $crop_type = $con->real_escape_string($_POST['crop_type']);
    $crop_name = $con->real_escape_string($_POST['crop_name']);
    $crop_quantity = $con->real_escape_string($_POST['crop_quantity']);
    $crop_mep = $con->real_escape_string($_POST['crop_mep']);
    $crop_f_mobile = $_SESSION["sessionid"];
    $crop_status = 0;

    $sql = "Select * from cropdetails where cro_type='$crop_type' and cro_name='$crop_name'";
    $query = mysqli_query($con, $sql);

    while ($res = mysqli_fetch_array($query)) {
        $crop_cro_id = $res['cro_id'];
        $crop_cro_msp = $res['cro_msp'];
    }
    $crop_final_mep_range = $crop_cro_msp + ($crop_cro_msp * 0.25);

    $date = date("Y/m/d");

    if (($crop_mep <= $crop_cro_msp) || ($crop_mep >= $crop_final_mep_range)) {
        echo "<script type='text/javascript'>$('#errorshow1').html('<p>Please Enter Minimum Expected Price (MEP) less than 25% of Minimum Selling Price (MSP).</p>'); 
        $('#errorshow2').html('<br><center><h5>Unsuccessful Attempt</h5></center>');</script>";
    } else {

        #file name with a random number so that similar dont get replaced
        $crop_img1 = "1" . rand(100, 10000) . "-" . rand(100, 10000) . "-" . rand(100, 10000) . "-" . $f_mobile . ".png";
        $crop_img2 = "1" . rand(100, 10000) . "-" . rand(100, 10000) . "-" . rand(100, 10000) . "-" . $f_mobile . ".png";
        $crop_img3 = "1" . rand(100, 10000) . "-" . rand(100, 10000) . "-" . rand(100, 10000) . "-" . $f_mobile . ".png";

        #temporary file name to store file
        $tname1 = $_FILES["crop_img1"]["tmp_name"];
        $tname2 = $_FILES["crop_img2"]["tmp_name"];
        $tname3 = $_FILES["crop_img3"]["tmp_name"];

        #target path
        $target_path1 = "assets/documents/crop/" . $crop_img1;
        $target_path2 = "assets/documents/crop/" . $crop_img2;
        $target_path3 = "assets/documents/crop/" . $crop_img3;

        #TO move the uploaded file to specific location
        move_uploaded_file($tname1, $target_path1);
        move_uploaded_file($tname2, $target_path2);
        move_uploaded_file($tname3, $target_path3);

        $query = "INSERT into cropsale(cr_f_mobile, cr_cro_id, cr_quantity,cr_mep,cr_img1,cr_img2,cr_img3, cr_date, cr_status) VALUES('$crop_f_mobile', '$crop_cro_id', '$crop_quantity','$crop_mep','$target_path1','$target_path2','$target_path3','$date', '$crop_status')";
        $success = $con->query($query);

        $query1 = "INSERT into mepdetails(cro_id,mep) VALUES('$crop_cro_id', '$crop_mep')";
        $success = $con->query($query1);
        echo "<script type='text/javascript'>location.replace('activecrop.php');</script>";
    }
}

$con->close();

?>
<!-- <html>
</html> -->