<?php 

error_reporting(0);
$con = mysqli_connect("localhost", "root", "", "tapship");

//Create Connection


if (isset($_POST["submit"])) {
    #retrieve file title
    $customer_type = $con->real_escape_string($_POST['customer_type']);
    $customer_mobile = $con->real_escape_string($_POST['customer_mobile']);
    $customer_name = $con->real_escape_string($_POST['customer_name']);
    $customer_contactname = $con->real_escape_string($_POST['customer_contactname']);
    $customer_gender = $con->real_escape_string($_POST['customer_gender']);
    $customer_age = $con->real_escape_string($_POST['customer_age']);
    $customer_street = $con->real_escape_string($_POST['customer_street']);
    $customer_city = $con->real_escape_string($_POST['customer_city']);
    $customer_state = $con->real_escape_string($_POST['customer_state']);
    $customer_pincode = $con->real_escape_string($_POST['customer_pincode']);
    $customer_aadhar = $con->real_escape_string($_POST['customer_aadhar']);
    $customer_pan = $con->real_escape_string($_POST['customer_pan']);
    $customer_password = $con->real_escape_string($_POST['customer_password']);
    $customer_approve = 1;

    $sql = "Select * from customer";
    $result = $con->query($sql);

    if (mysqli_num_rows($result) > 0) {
        while ($res = mysqli_fetch_assoc($result)) {
            if ($res["c_mobile"] == $customer_mobile) {
                header("location: alreadyregistered.php");
            }
        }
    }
                #file name with a random number so that similar dont get replaced
                $customer_aadharpdf = $customer_mobile . "-" . $customer_name . "-" . $_FILES["customer_aadharpdf"]["name"];
                $customer_panpdf = $customer_mobile . "-" . $customer_name . "-" . $_FILES["customer_panpdf"]["name"];
                $customer_photo = $customer_mobile . "-" . $customer_name . "-" . $_FILES["customer_photo"]["name"];
                $customer_registration = $customer_mobile . "-" . $customer_name . "-" . $_FILES["customer_registration"]["name"];

                #temporary file name to store file
                $tname1 = $_FILES["customer_aadharpdf"]["tmp_name"];
                $tname2 = $_FILES["customer_panpdf"]["tmp_name"];
                $tname3 = $_FILES["customer_photo"]["tmp_name"];
                $tname4 = $_FILES["customer_registration"]["tmp_name"];

                #target path
                $target_path1 = "assets/documents/aadhar/" . $customer_aadharpdf;
                $target_path2 = "assets/documents/pan/" . $customer_panpdf;
                $target_path3 = "assets/documents/photo/" . $customer_photo;
                $target_path4 = "assets/documents/registration/" . $customer_registration;

                #TO move the uploaded file to specific location
                move_uploaded_file($tname1, $target_path1);
                move_uploaded_file($tname2, $target_path2);
                move_uploaded_file($tname3, $target_path3);
                move_uploaded_file($tname4, $target_path4);

                $q = "INSERT into otps(mobile) VALUES('$customer_mobile')";
                $success = $con->query($q);

                echo "<script>location.replace('account_verification.php?customer_type=$customer_type&customer_mobile=$customer_mobile&customer_name=$customer_name&customer_contactname=$customer_contactname&customer_gender=$customer_gender&customer_age=$customer_age&customer_street=$customer_street&customer_city=$customer_city&customer_state=$customer_state&customer_pincode=$customer_pincode&customer_aadhar=$customer_aadhar&customer_pan=$customer_pan&customer_password=$customer_password&customer_approve=1&target_path1=$target_path1&target_path2=$target_path2&target_path3=$target_path3&target_path4=$target_path4')</script>";
                exit();
}

?>