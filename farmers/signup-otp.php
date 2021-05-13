<?php 

error_reporting(0);
 $con = mysqli_connect("remotemysql.com", "m1t7Rrl6v7", "gIP1i7Re2y", "m1t7Rrl6v7");

//Create Connection


if (isset($_POST["submit"])) {
    #retrieve file title
    $farmer_mobile = $con->real_escape_string($_POST['farmer_mobile']);
    $farmer_name = $con->real_escape_string($_POST['farmer_name']);
    $farmer_gender = $con->real_escape_string($_POST['farmer_gender']);
    $farmer_age = $con->real_escape_string($_POST['farmer_age']);
    $farmer_street = $con->real_escape_string($_POST['farmer_street']);
    $farmer_city = $con->real_escape_string($_POST['farmer_city']);
    $farmer_state = $con->real_escape_string($_POST['farmer_state']);
    $farmer_pincode = $con->real_escape_string($_POST['farmer_pincode']);
    $farmer_aadhar = $con->real_escape_string($_POST['farmer_aadhar']);
    $farmer_pan = $con->real_escape_string($_POST['farmer_pan']);
    $farmer_bankholder = $con->real_escape_string($_POST['farmer_bankholder']);
    $farmer_bankaccount = $con->real_escape_string($_POST['farmer_bankaccount']);
    $farmer_bankifsc = $con->real_escape_string($_POST['farmer_bankifsc']);
    $farmer_bankname = $con->real_escape_string($_POST['farmer_bankname']);
    $farmer_bankbranch = $con->real_escape_string($_POST['farmer_bankbranch']);
    $farmer_password = $con->real_escape_string($_POST['farmer_password']);
    $farmer_approve = 1;

    $sql = "Select * from farmer";
    $result = $con->query($sql);

    if (mysqli_num_rows($result) > 0) {
        while ($res = mysqli_fetch_assoc($result)) {
            if ($res["f_mobile"] == $farmer_mobile) {
                header("location: alreadyregistered.php");
            } else {
                #file name with a random number so that similar dont get replaced
                $farmer_aadharpdf = $farmer_mobile . "-" . $farmer_name . "-" . $_FILES["farmer_aadharpdf"]["name"];
                $farmer_panpdf = $farmer_mobile . "-" . $farmer_name . "-" . $_FILES["farmer_panpdf"]["name"];
                $farmer_photo = $farmer_mobile . "-" . $farmer_name . "-" . $_FILES["farmer_photo"]["name"];
                $farmer_bankpassbook = $farmer_mobile . "-" . $farmer_name . "-" . $_FILES["farmer_bankpassbook"]["name"];

                #temporary file name to store file
                $tname1 = $_FILES["farmer_aadharpdf"]["tmp_name"];
                $tname2 = $_FILES["farmer_panpdf"]["tmp_name"];
                $tname3 = $_FILES["farmer_photo"]["tmp_name"];
                $tname4 = $_FILES["farmer_bankpassbook"]["tmp_name"];

                #target path
                $target_path1 = "assets/documents/aadhar/" . $farmer_aadharpdf;
                $target_path2 = "assets/documents/pan/" . $farmer_panpdf;
                $target_path3 = "assets/documents/photo/" . $farmer_photo;
                $target_path4 = "assets/documents/passbook/" . $farmer_bankpassbook;


                #TO move the uploaded file to specific location
                move_uploaded_file($tname1, $target_path1);
                move_uploaded_file($tname2, $target_path2);
                move_uploaded_file($tname3, $target_path3);
                move_uploaded_file($tname4, $target_path4);

                q = "INSERT into otps(mobile) VALUES('$farmer_mobile')";
                $success = $con->query($q);

                echo "<script>location.replace('account_verification.php?farmer_mobile=$farmer_mobile&farmer_name=$farmer_name&farmer_gender=$farmer_gender&farmer_age=$farmer_age&farmer_street=$farmer_street&farmer_city=$farmer_city&farmer_state=$farmer_state&farmer_pincode=$farmer_pincode&farmer_aadhar=$farmer_aadhar&farmer_pan=$farmer_pan&farmer_bankholder=$farmer_bankholder&farmer_bankaccount=$farmer_bankaccount&farmer_bankifsc=$farmer_bankifsc&farmer_bankname=$farmer_bankname&farmer_bankbranch=$farmer_bankbranch&farmer_password=$farmer_password&farmer_approve=1&target_path1=$target_path1&target_path2=$target_path2&target_path3=$target_path3&target_path4=$target_path4')</script>";
                exit();
            }
        }
    }
}

?>