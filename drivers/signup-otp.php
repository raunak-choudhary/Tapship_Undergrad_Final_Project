<?php 

//error_reporting(0);
 $con = mysqli_connect("remotemysql.com", "m1t7Rrl6v7", "gIP1i7Re2y", "m1t7Rrl6v7");

//Create Connection
$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($con->connect_error);

if (isset($_POST["submit"])) {
    #retrieve file title
    $driver_mobile = $con->real_escape_string($_POST['driver_mobile']);
    $driver_name = $con->real_escape_string($_POST['driver_name']);
    $driver_gender = $con->real_escape_string($_POST['driver_gender']);
    $driver_age = $con->real_escape_string($_POST['driver_age']);
    $driver_street = $con->real_escape_string($_POST['driver_street']);
    $driver_city = $con->real_escape_string($_POST['driver_city']);
    $driver_state = $con->real_escape_string($_POST['driver_state']);
    $driver_pincode = $con->real_escape_string($_POST['driver_pincode']);
    $driver_aadhar = $con->real_escape_string($_POST['driver_aadhar']);
    $driver_pan = $con->real_escape_string($_POST['driver_pan']);
    $driver_dlnumber = $con->real_escape_string($_POST['driver_dlnumber']);
    $driver_vehiclenumber = $con->real_escape_string($_POST['driver_vehiclenumber']);
    $driver_password = $con->real_escape_string($_POST['driver_password']);
    $driver_approve = 1;

    $sql = "Select * from driver";
    $result = $con->query($sql);

    if (mysqli_num_rows($result) > 0) {
        while ($res = mysqli_fetch_assoc($result)) {
            if ($res["d_mobile"] == $driver_mobile) {
                header("location: alreadyregistered.php");
            } else {

                #file name with a random number so that similar dont get replaced
                $driver_aadharpdf = $driver_mobile . "-" . $driver_name . "-" . $_FILES["driver_aadharpdf"]["name"];
                $driver_panpdf = $driver_mobile . "-" . $driver_name . "-" . $_FILES["driver_panpdf"]["name"];
                $driver_photo = $driver_mobile . "-" . $driver_name . "-" . $_FILES["driver_photo"]["name"];
                $driver_dlpdf = $driver_mobile . "-" . $driver_name . "-" . $_FILES["driver_dlpdf"]["name"];
                $driver_vehiclercpdf = $driver_mobile . "-" . $driver_name . "-" . $_FILES["driver_vehiclercpdf"]["name"];

                #temporary file name to store file
                $tname1 = $_FILES["driver_aadharpdf"]["tmp_name"];
                $tname2 = $_FILES["driver_panpdf"]["tmp_name"];
                $tname3 = $_FILES["driver_photo"]["tmp_name"];
                $tname4 = $_FILES["driver_dlpdf"]["tmp_name"];
                $tname5 = $_FILES["driver_vehiclercpdf"]["tmp_name"];

                #target path
                $target_path1 = "assets/documents/aadhar/" . $driver_aadharpdf;
                $target_path2 = "assets/documents/pan/" . $driver_panpdf;
                $target_path3 = "assets/documents/photo/" . $driver_photo;
                $target_path4 = "assets/documents/dlpdf/" . $driver_dlpdf;
                $target_path5 = "assets/documents/rcpdf/" . $driver_vehiclercpdf;

                $pinurl = file_get_contents('https://dev.virtualearth.net/REST/v1/Locations?countryRegion=IN&o=json&postalCode='.$driver_pincode.'&maxResults=1&key=Alcd58ybycSq_3khfOUdGYo7AnC4PMT_03DlC6y8r7lcWZk7IwtK17LDNMq0_l3d');
                $data = json_decode($pinurl, true);
            
                $d_lat = $data['resourceSets'][0]['resources'][0]['point']['coordinates'][0];
                $d_long = $data['resourceSets'][0]['resources'][0]['point']['coordinates'][1];

                date_default_timezone_set("Asia/Calcutta");
                $d_date =  date("Y-m-d");
                $d_time = date("h:i A");

                #TO move the uploaded file to specific location
                move_uploaded_file($tname1, $target_path1);
                move_uploaded_file($tname2, $target_path2);
                move_uploaded_file($tname3, $target_path3);
                move_uploaded_file($tname4, $target_path4);
                move_uploaded_file($tname5, $target_path5);

                $q = "INSERT into otps(mobile) VALUES('$driver_mobile')";
                $success = $con->query($q);

                echo "<script>location.replace('account_verification.php?driver_mobile=$driver_mobile&driver_name=$driver_name&driver_gender=$driver_gender&driver_age=$driver_age&driver_street=$driver_street&driver_city=$driver_city&driver_state=$driver_state&driver_pincode=$driver_pincode&driver_aadhar=$driver_aadhar&driver_pan=$driver_pan&driver_dlnumber=$driver_dlnumber&driver_vehiclenumber=$driver_vehiclenumber&driver_password=$driver_password&d_lat=$d_lat&d_long=$d_long&driver_approve=1&target_path1=$target_path1&target_path2=$target_path2&target_path3=$target_path3&target_path4=$target_path4&target_path5=$target_path5')</script>";
                exit();
            }
        }
    }
}

?>