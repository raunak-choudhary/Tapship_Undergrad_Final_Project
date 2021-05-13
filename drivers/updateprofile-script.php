<?php
include('session-script.php');
$res = $_SESSION["sessionid"];
$d_mobile= $res;
if(!isset($_SESSION['login_driver'])){
header("location: login.php"); // Redirecting To Profile Page
}

 $con = mysqli_connect("remotemysql.com", "m1t7Rrl6v7", "gIP1i7Re2y", "m1t7Rrl6v7");
if(!$con)
{
    die(" Connection Error ");
}

    
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

    //Code for Error Generation
    
    $OldData=$con->query("SELECT * FROM driver WHERE d_mobile='".$d_mobile."'")->fetch_assoc();

    if($driver_aadhar!=$OldData['d_aadhar'] && empty($_FILES['driver_aadharfile'])){
        echo "1"; //unique response code
    }
    else if($driver_pan!=$OldData['d_pan'] && empty($_FILES['driver_panfile'])){
        echo "2"; //unique response code
    }
    else if($driver_dlnumber!=$OldData['d_dlnumber'] && empty($_FILES['driver_dlfile'])){
        echo "3"; //unique response code
    }
    else if($driver_vehiclenumber!=$OldData['d_vehiclenumber'] && empty($_FILES['driver_vehiclercfile'])){
        echo "4"; //unique response code
    }
    else{
        #sql query to insert into database
        $query = "update driver set d_name = '".$driver_name."', d_gender = '".$driver_gender."', d_age = '".$driver_age."', d_street = '".$driver_street."', d_city = '".$driver_city."', d_state = '".$driver_state."', d_pincode = '".$driver_pincode."', d_aadhar = '".$driver_aadhar."', d_pan = '".$driver_pan."', d_dlnumber = '".$driver_dlnumber."', d_vehiclenumber = '".$driver_vehiclenumber."', d_password = '".$driver_password."' where d_mobile = '".$d_mobile."'";
        $result = mysqli_query($con,$query);
        if($result){
            echo "0";
            
            if(!empty($_FILES['driver_aadharfile'])){
                $driver_adhar= $d_mobile."-".$driver_name."-".$_FILES["driver_aadharfile"]["name"];
                $tmpAadhar = $_FILES["driver_aadharfile"]["tmp_name"];
                $dirAadhar= "assets/documents/aadhar/".$driver_adhar;
                move_uploaded_file($tmpAadhar, $dirAadhar);
                $query1 = "update driver set d_aadharpdf = '".$dirAadhar."' where d_mobile = '".$d_mobile."'";
                $result1 = mysqli_query($con,$query1);
            }

            if(!empty($_FILES['driver_panfile'])){
                $driver_pan= $d_mobile."-".$driver_name."-".$_FILES["driver_panfile"]["name"];
                $tmpPan = $_FILES["driver_panfile"]["tmp_name"];
                $dirPan = "assets/documents/pan/".$driver_pan;
                move_uploaded_file($tmpPan, $dirPan);
                $query2 = "update driver set d_panpdf = '".$dirPan."' where d_mobile = '".$d_mobile."'";
                $result2 = mysqli_query($con,$query2);
            }

            if(!empty($_FILES['driver_dlfile'])){
                $driver_dlfile= $d_mobile."-".$driver_name."-".$_FILES["driver_dlfile"]["name"];
                $tmpDlfile = $_FILES["driver_dlfile"]["tmp_name"];
                $dirDlfile = "assets/documents/dlpdf/".$driver_dlfile;
                move_uploaded_file($tmpDlfile, $dirDlfile);
                $query3 = "update driver set d_dlpdf = '".$dirDlfile."' where d_mobile = '".$d_mobile."'";
                $result3 = mysqli_query($con,$query3);
            }
            if(!empty($_FILES['driver_vehiclercfile'])){
                $driver_vehiclerc= $d_mobile."-".$driver_name."-".$_FILES["driver_vehiclercfile"]["name"];
                $tmpVehiclerc = $_FILES["driver_vehiclercfile"]["tmp_name"];
                $dirVehiclerc = "assets/documents/rcpdf/".$driver_vehiclerc;
                move_uploaded_file($tmpVehiclerc, $dirVehiclerc);
                $query4 = "update driver set d_vehiclercpdf = '".$dirVehiclerc."' where d_mobile = '".$d_mobile."'";
                $result4 = mysqli_query($con,$query4);
            }
        }
    }
?>