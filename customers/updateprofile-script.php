<?php
include('session-script.php');
$res = $_SESSION["sessionid"];
$c_mobile= $res;
if(!isset($_SESSION['login_customer'])){
header("location: login.php"); // Redirecting To Profile Page
}

$con=mysqli_connect("localhost","root","","tapship");
    if(!$con)
    {
        die(" Connection Error ");
    }

    $c_mobile = $_POST['c_mobile'];
    $customer_type = $_POST['customer_type'];
    $customer_name =  $_POST['customer_name'];
    $customer_contactname =  $_POST['customer_contactname'];
    $customer_gender =  $_POST['customer_gender'];
    $customer_age =  $_POST['customer_age'];
    $customer_street =  $_POST['customer_street'];
    $customer_city =  $_POST['customer_city'];
    $customer_state = $_POST['customer_state'];
    $customer_pincode =  $_POST['customer_pincode'];
    $customer_aadhar =  $_POST['customer_aadhar'];
    $customer_pan =  $_POST['customer_pan'];
    $customer_password =  $_POST['customer_password'];

    $OldData=$con->query("SELECT * FROM customer WHERE c_mobile='".$c_mobile."'")->fetch_assoc();

    if($customer_type=="Wholesaler")
    {
        if($customer_aadhar!=$OldData['c_aadhar'] && empty($_FILES['customer_aadharfile'])){
            echo 1; //unique response code
        }
        else if($customer_pan!=$OldData['c_pan'] && empty($_FILES['customer_panfile'])){
            echo 2; //unique response code
        }
        else{
        $query = "update customer set c_name = '".$customer_name."', c_gender = '".$customer_gender."', c_age = '".$customer_age."', c_street = '".$customer_street."', c_city = '".$customer_city."', c_state = '".$customer_state."', c_pincode = '".$customer_pincode."', c_aadhar = '".$customer_aadhar."', c_pan = '".$customer_pan."', c_password = '".$customer_password."' where c_mobile = '".$c_mobile."'";
        $result = mysqli_query($con,$query);
        if($result){
            echo 0;

            if(!empty($_FILES['customer_aadharfile'])){
                $customer_aadhar= $c_mobile."-".$customer_name."-".$_FILES["customer_aadharfile"]["name"];
                $tmpAadhar = $_FILES["customer_aadharfile"]["tmp_name"];
                $dirAadhar= "assets/documents/aadhar/".$customer_aadhar;
                move_uploaded_file($tmpAadhar, $dirAadhar);
                $query1 = "update customer set c_aadharpdf = '".$dirAadhar."' where c_mobile = '".$c_mobile."'";
                $result1 = mysqli_query($con,$query1);
            }

            if(!empty($_FILES['customer_panfile'])){
                $customer_pan= $c_mobile."-".$customer_name."-".$_FILES["customer_panfile"]["name"];
                $tmpPan = $_FILES["customer_panfile"]["tmp_name"];
                $dirPan = "assets/documents/pan/".$customer_pan;
                move_uploaded_file($tmpPan, $dirPan);
                $query2 = "update customer set c_panpdf = '".$dirPan."' where c_mobile = '".$c_mobile."'";
                $result2 = mysqli_query($con,$query2);
            }
        }
        }
    }
    if($customer_type=="Organization")
    {
        if($customer_name!=$OldData['c_name'] && empty($_FILES['customer_registrationfile'])){
            echo 3; //unique response code
        }
        else if($customer_pan!=$OldData['c_pan'] && empty($_FILES['customer_panfile'])){
            echo 2; //unique response code
        }
        else{
        $query = "update customer set c_name = '".$customer_name."', c_contactname = '".$customer_contactname."'c_gender = '".$customer_gender."', c_age = '".$customer_age."', c_street = '".$customer_street."', c_city = '".$customer_city."', c_state = '".$customer_state."', c_pincode = '".$customer_pincode."', c_pan = '".$customer_pan."', c_password = '".$customer_password."' where c_mobile = '".$c_mobile."'";
        $result = mysqli_query($con,$query);
        if($result){
            echo 0;

            if(!empty($_FILES['customer_panfile'])){
                $customer_pan= $c_mobile."-".$customer_name."-".$_FILES["customer_panfile"]["name"];
                $tmpPan = $_FILES["customer_panfile"]["tmp_name"];
                $dirPan = "assets/documents/pan/".$customer_pan;
                move_uploaded_file($tmpPan, $dirPan);
                $query1 = "update customer set c_panpdf = '".$dirPan."' where c_mobile = '".$c_mobile."'";
                $result1 = mysqli_query($con,$query1);
            }

            if(!empty($_FILES['customer_registrationfile'])){
                $customer_registration= $c_mobile."-".$customer_name."-".$_FILES["customer_registrationfile"]["name"];
                $tmpRegistration = $_FILES["customer_registrationfile"]["tmp_name"];
                $dirRegistration= "assets/documents/registration/".$customer_registration;
                move_uploaded_file($tmpRegistration, $dirRegistration);
                $query2 = "update customer set c_registration = '".$dirRegistration."' where c_mobile = '".$c_mobile."'";
                $result2 = mysqli_query($con,$query2);
            }
        }
        }
    }
?>
