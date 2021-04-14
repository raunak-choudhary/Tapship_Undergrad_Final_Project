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

    #retrieve file title
    $c_mobile = $_POST['c_mobile'];
    $customer_type = $con->real_escape_string($_POST['customer_type']);
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
    $customer_photo =  $_POST['customer_photo'];
    $customer_password =  $_POST['customer_password'];

    #file name with a random number so that similar dont get replaced
    //$customer_aadharpdf= $customer_mobile."-".$customer_name."-".$_FILES["customer_aadharpdf"]["name"];
    //$customer_panpdf= $customer_mobile."-".$customer_name."-".$_FILES["customer_panpdf"]["name"];
    //$customer_photo= $customer_mobile."-".$customer_name."-".$_FILES["customer_photo"]["name"];
    //$customer_registration= $customer_mobile."-".$customer_name."-".$_FILES["customer_registration"]["name"];

    #temporary file name to store file
    //$tname1 = $_FILES["customer_aadharpdf"]["tmp_name"];
    //$tname2 = $_FILES["customer_panpdf"]["tmp_name"];
    //$tname3 = $_FILES["customer_photo"]["tmp_name"];
    //$tname4 = $_FILES["customer_registration"]["tmp_name"];

    #target path
    //$target_path1 = "assets/documents/aadhar/".$customer_aadharpdf;
    //$target_path2 = "assets/documents/pan/".$customer_panpdf;
    //$target_path3 = "assets/documents/photo/".$customer_photo;
    //$target_path4 = "assets/documents/registration/".$customer_registration;

    #TO move the uploaded file to specific location
    //move_uploaded_file($tname1, $target_path1);
    //move_uploaded_file($tname2, $target_path2);
    //move_uploaded_file($tname3, $target_path3);
    //move_uploaded_file($tname4, $target_path4);

    $OldData=$con->query("SELECT * FROM customer WHERE c_mobile='".$c_mobile."'")->fetch_assoc();

    //is account details changed
    if($customer_type=="Wholesaler")
    {
        if($customer_aadhar!=$OldData['c_aadhar'] && $customer_pan!=$OldData['c_pan']){
            echo 1; //unique response code
        }
        else if($customer_aadhar!=$OldData['c_aadhar']){
            echo 2; //unique response code
        }
        else if($customer_pan!=$OldData['c_pan']){
            echo 3; //unique response code
        }
        else{
        #sql query to insert into database
        $query = "update customer set c_name = '".$customer_name."', c_gender = '".$customer_gender."', c_age = '".$customer_age."', c_street = '".$customer_street."', c_city = '".$customer_city."', c_state = '".$customer_state."', c_pincode = '".$customer_pincode."', c_aadhar = '".$customer_aadhar."', c_pan = '".$customer_pan."', c_password = '".$customer_password."' where c_mobile = '".$c_mobile."'";
        $result = mysqli_query($con,$query);
        if($result){
            echo 0;
        }
        }
    }
    if($customer_type=="Organization")
    {
        //if($customer_name!=$OldData['c_name'] && $customer_pan!=$OldData['c_pan']){
        //    echo 1; //unique response code
        //}
        if($customer_name!=$OldData['c_name']){
            echo 4; //unique response code
        }
        else if($customer_pan!=$OldData['c_pan']){
            echo 3; //unique response code
        }
        else{
        #sql query to insert into database
        $query = "update customer set c_name = '".$customer_name."', c_contactname = '".$customer_contactname."'c_gender = '".$customer_gender."', c_age = '".$customer_age."', c_street = '".$customer_street."', c_city = '".$customer_city."', c_state = '".$customer_state."', c_pincode = '".$customer_pincode."', c_pan = '".$customer_pan."', c_password = '".$customer_password."' where c_mobile = '".$c_mobile."'";
        $result = mysqli_query($con,$query);
        if($result){
            echo 0;
        }
        }
    }
?>
