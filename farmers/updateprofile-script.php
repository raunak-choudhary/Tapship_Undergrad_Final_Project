<?php
include('session-script.php');
$res = $_SESSION["sessionid"];
$f_mobile= $res;
if(!isset($_SESSION['login_farmer'])){
    header("location: login.php"); // Redirecting To Profile Page
}

     $con = mysqli_connect("remotemysql.com", "m1t7Rrl6v7", "gIP1i7Re2y", "m1t7Rrl6v7");
    if(!$con)
    {
        die(" Connection Error ");
    }


        $f_mobile = $_POST['f_mobile'];
        $farmer_name = $_POST['farmer_name'];
        $farmer_gender = $_POST['farmer_gender'];
        $farmer_age = $_POST['farmer_age'];
        $farmer_street = $_POST['farmer_street'];
        $farmer_city = $_POST['farmer_city'];
        $farmer_state= $_POST['farmer_state'];
        $farmer_pincode= $_POST['farmer_pincode'];
        $farmer_aadhar= $_POST['farmer_aadhar'];
        $farmer_pan= $_POST['farmer_pan'];
        $farmer_bankholder= $_POST['farmer_bankholder'];
        $farmer_bankaccount= $_POST['farmer_bankaccount'];
        $farmer_bankifsc= $_POST['farmer_bankifsc'];
        $farmer_bankname= $_POST['farmer_bankname'];
        $farmer_bankbranch= $_POST['farmer_bankbranch'];
        $farmer_password= $_POST['farmer_password'];

        $OldData=$con->query("SELECT * FROM farmer WHERE f_mobile='".$f_mobile."'")->fetch_assoc();

    if($farmer_aadhar!=$OldData['f_aadhar'] && empty($_FILES['farmer_aadharfile'])){
            echo '1';
        }

    else if($farmer_pan!=$OldData['f_pan'] && empty($_FILES['farmer_panfile'])){
        echo "2";
    }

    else if( ($farmer_bankaccount!=$OldData['f_bankaccount'] && empty($_FILES['farmer_bankpassbook'])) ||
        ($farmer_bankholder!=$OldData['f_bankholder'] && empty($_FILES['farmer_bankpassbook'])) ||
        ($farmer_bankifsc!=$OldData['f_bankifsc'] && empty($_FILES['farmer_bankpassbook'])) || 
        ($farmer_bankname!=$OldData['f_bankname'] && empty($_FILES['farmer_bankpassbook'])) || 
        ($farmer_bankbranch!=$OldData['f_bankbranch'] && empty($_FILES['farmer_bankpassbook']))){
        echo "3";
    }

    else{

        $query = "update farmer set f_name = '".$farmer_name."', f_gender = '".$farmer_gender."', f_age = '".$farmer_age."', f_street = '".$farmer_street."', f_city = '".$farmer_city."', f_state = '".$farmer_state."', f_pincode = '".$farmer_pincode."', f_aadhar = '".$farmer_aadhar."', f_pan = '".$farmer_pan."', f_bankholder = '".$farmer_bankholder."', f_bankaccount = '".$farmer_bankaccount."', f_bankifsc = '".$farmer_bankifsc."', f_bankname = '".$farmer_bankname."', f_bankbranch = '".$farmer_bankbranch."', f_password = '".$farmer_password."' where f_mobile = '".$f_mobile."'";
            $result = mysqli_query($con,$query);
            if($result){
                echo '0';

                if(!empty($_FILES['farmer_aadharfile'])){
                    $farmer_adhar= $f_mobile."-".$farmer_name."-".$_FILES["farmer_aadharfile"]["name"];
                    $tmpAadhar = $_FILES["farmer_aadharfile"]["tmp_name"];
                    $dirAadhar= "assets/documents/aadhar/".$farmer_adhar;
                    move_uploaded_file($tmpAadhar, $dirAadhar);
                    $query1 = "update farmer set f_aadharpdf = '".$dirAadhar."' where f_mobile = '".$f_mobile."'";
                    $result1 = mysqli_query($con,$query1);
                }

                if(!empty($_FILES['farmer_panfile'])){
                    $farmer_pan= $f_mobile."-".$farmer_name."-".$_FILES["farmer_panfile"]["name"];
                    $tmpPan = $_FILES["farmer_panfile"]["tmp_name"];
                    $dirPan = "assets/documents/pan/".$farmer_pan;
                    move_uploaded_file($tmpPan, $dirPan);
                    $query2 = "update farmer set f_panpdf = '".$dirPan."' where f_mobile = '".$f_mobile."'";
                    $result2 = mysqli_query($con,$query2);
                }

                if(!empty($_FILES['farmer_bankpassbook'])){
                    $farmer_bankpassbook= $f_mobile."-".$farmer_name."-".$_FILES["farmer_bankpassbook"]["name"];
                    $tmpPassbook = $_FILES["farmer_bankpassbook"]["tmp_name"];
                    $dirPassbook = "assets/documents/passbook/".$farmer_bankpassbook;
                    move_uploaded_file($tmpPassbook, $dirPassbook);
                    $query3 = "update farmer set f_bankpassbook = '".$dirPassbook."' where f_mobile = '".$f_mobile."'";
                    $result3 = mysqli_query($con,$query3);
                }
                
            }
    }
?>