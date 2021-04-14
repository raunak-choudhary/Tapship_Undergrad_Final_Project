<?php

include('session-script.php');
$res = $_SESSION["sessionid"];
$d_mobile= $res;
if(!isset($_SESSION['login_driver'])){
header("location: login.php"); // Redirecting To Profile Page
}

$con=mysqli_connect("localhost","root","","tapship");
if(!$con)
{
    die(" Connection Error ");
}

    #retrieve file title
    $d_mobile = $_POST['d_mobile'];
    $driver_name =  $_POST['driver_name'];
    $driver_gender =  $_POST['driver_gender'];
    $driver_age =  $_POST['driver_age'];
    $driver_street =  $_POST['driver_street'];
    $driver_city =  $_POST['driver_city'];
    $driver_state =  $_POST['driver_state'];
    $driver_pincode =  $_POST['driver_pincode'];
    $driver_aadhar =  $_POST['driver_aadhar'];
    $driver_pan =  $_POST['driver_pan'];
    $driver_dlnumber =  $_POST['driver_dlnumber'];
    $driver_vehiclenumber =  $_POST['driver_vehiclenumber'];
    $driver_password =  $_POST['driver_password'];
    

    #file name with a random number so that similar dont get replaced
    // $driver_aadharpdf= $driver_mobile."-".$driver_name."-".$_FILES["driver_aadharpdf"]["name"];
    // $driver_panpdf= $driver_mobile."-".$driver_name."-".$_FILES["driver_panpdf"]["name"];
    // $driver_photo= $driver_mobile."-".$driver_name."-".$_FILES["driver_photo"]["name"];
    // $driver_dlpdf= $driver_mobile."-".$driver_name."-".$_FILES["driver_dlpdf"]["name"];
    // $driver_vehiclercpdf= $driver_mobile."-".$driver_name."-".$_FILES["driver_vehiclercpdf"]["name"];

    #temporary file name to store file
    // $tname1 = $_FILES["driver_aadharpdf"]["tmp_name"];
    // $tname2 = $_FILES["driver_panpdf"]["tmp_name"];
    // $tname3 = $_FILES["driver_photo"]["tmp_name"];
    // $tname4 = $_FILES["driver_dlpdf"]["tmp_name"];
    // $tname5 = $_FILES["driver_vehiclercpdf"]["tmp_name"];

    #target path
    // $target_path1 = "assets/documents/aadhar/".$driver_aadharpdf;
    // $target_path2 = "assets/documents/pan/".$driver_panpdf;
    // $target_path3 = "assets/documents/photo/".$driver_photo;
    // $target_path4 = "assets/documents/dlpdf/".$driver_dlpdf;
    // $target_path5 = "assets/documents/rcpdf/".$driver_vehiclercpdf;

    #TO move the uploaded file to specific location
    // move_uploaded_file($tname1, $target_path1);
    // move_uploaded_file($tname2, $target_path2);
    // move_uploaded_file($tname3, $target_path3);
    // move_uploaded_file($tname4, $target_path4);
    // move_uploaded_file($tname5, $target_path5);

        //fetch old data
        $OldData=$con->query("SELECT * FROM driver WHERE d_mobile='".$d_mobile."'")->fetch_assoc();

        //is account details changed
        if($driver_aadhar!=$OldData['d_aadhar'] && $driver_pan!=$OldData['d_pan'] && $driver_dlnumber!=$OldData['d_dlnumber'] && $driver_vehiclenumber!=$OldData['d_vehiclenumber']){
            echo 1; //unique response code
        }
        else if($driver_aadhar!=$OldData['d_aadhar'] && $driver_pan!=$OldData['d_pan']  && $driver_dlnumber!=$OldData['d_dlnumber']){
            echo 2; //unique response code
        }
        else if($driver_aadhar!=$OldData['d_aadhar'] && $driver_pan!=$OldData['d_pan'] && $driver_vehiclenumber!=$OldData['d_vehiclenumber']){
            echo 3; //unique response code
        }
        else if($driver_aadhar!=$OldData['d_aadhar'] && $driver_dlnumber!=$OldData['d_dlnumber'] && $driver_vehiclenumber!=$OldData['d_vehiclenumber']){
            echo 4; //unique response code
        }
        else if($driver_pan!=$OldData['d_pan'] && $driver_dlnumber!=$OldData['d_dlnumber'] && $driver_vehiclenumber!=$OldData['d_vehiclenumber']){
            echo 5; //unique response code
        }
        else if($driver_aadhar!=$OldData['d_aadhar'] && $driver_pan!=$OldData['d_pan']){
            echo 6; //unique response code
        }
        else if($driver_aadhar!=$OldData['d_aadhar'] && $driver_dlnumber!=$OldData['d_dlnumber']){
            echo 7; //unique response code
        }
        else if($driver_aadhar!=$OldData['d_aadhar'] && $driver_vehiclenumber!=$OldData['d_vehiclenumber']){
            echo 8; //unique response code
        }
        else if($driver_pan!=$OldData['d_pan'] && $driver_dlnumber!=$OldData['d_dlnumber']){
            echo 9; //unique response code
        }
        else if($driver_pan!=$OldData['d_pan'] && $driver_vehiclenumber!=$OldData['d_vehiclenumber']){
            echo 10; //unique response code
        }
        else if($driver_dlnumber!=$OldData['d_dlnumber'] && $driver_vehiclenumber!=$OldData['d_vehiclenumber']){
            echo 11; //unique response code
        }
        else if($driver_aadhar!=$OldData['d_aadhar']){
            echo 12; //unique response code
        }
        else if($driver_pan!=$OldData['d_pan']){
            echo 13; //unique response code
        }
        else if($driver_dlnumber!=$OldData['d_dlnumber']){
            echo 14; //unique response code
        }
        else if($driver_vehiclenumber!=$OldData['d_vehiclenumber']){
            echo 15; //unique response code
        }
        else{
        #sql query to insert into database
        $query = "update driver set d_name = '".$driver_name."', d_gender = '".$driver_gender."', d_age = '".$driver_age."', d_street = '".$driver_street."', d_city = '".$driver_city."', d_state = '".$driver_state."', d_pincode = '".$driver_pincode."', d_aadhar = '".$driver_aadhar."', d_pan = '".$driver_pan."', d_dlnumber = '".$driver_dlnumber."', d_vehiclenumber = '".$driver_vehiclenumber."', d_password = '".$driver_password."' where d_mobile = '".$d_mobile."'";
        $result = mysqli_query($con,$query);
        if($result){
            echo 0;
            }
        }
?>