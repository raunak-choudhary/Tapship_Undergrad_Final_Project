<?php
include('session-script.php');
$res = $_SESSION["sessionid"];
$f_mobile= $res;
if(!isset($_SESSION['login_farmer'])){
    header("location: login.php"); // Redirecting To Profile Page
}

    $con=mysqli_connect("localhost","root","","tapship");
    if(!$con)
    {
        die(" Connection Error ");
    }

        #retrieve file title
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
    
        //fetch old data
        $OldData=$con->query("SELECT * FROM farmer WHERE f_mobile='".$f_mobile."'")->fetch_assoc();

        //is account details changed
        if($farmer_aadhar!=$OldData['f_aadhar'] && $farmer_pan!=$OldData['f_pan']){
            //if documents details get changed and documets are not uploaded then print error
            if(empty($_FILES['farmer_aadharpdf']) || empty($_FILES['farmer_panpdf'])){
                echo 1; //unique response code
            }
            else{
               //upload file and updata Data
                $farmer_aadharpdf= $f_mobile."-".$farmer_name."-".$_FILES["farmer_aadharpdf"]["name"];
                $farmer_panpdf= $f_mobile."-".$farmer_name."-".$_FILES["farmer_panpdf"]["name"];
                $tname1 = $_FILES["farmer_aadharpdf"]["tmp_name"];
                $tname2 = $_FILES["farmer_panpdf"]["tmp_name"];
                $target_path1 = "assets/documents/aadhar/".$farmer_aadharpdf;
                $target_path2 = "assets/documents/pan/".$farmer_panpdf;
                if(move_uploaded_file($tname1, $target_path1) && move_uploaded_file($tname2, $target_path2)){
                    #sql query to insert into database
                    $query = "update farmer set f_name = '".$farmer_name."', f_gender = '".$farmer_gender."', f_age = '".$farmer_age."', f_street = '".$farmer_street."', f_city = '".$farmer_city."', f_state = '".$farmer_state."', f_pincode = '".$farmer_pincode."', f_aadhar = '".$farmer_aadhar."',f_aadharpdf = '".$target_path1."', f_pan = '".$farmer_pan."',f_panpdf = '".$target_path2."', f_bankholder = '".$farmer_bankholder."', f_bankaccount = '".$farmer_bankaccount."', f_bankifsc = '".$farmer_bankifsc."', f_bankname = '".$farmer_bankname."', f_bankbranch = '".$farmer_bankbranch."', f_password = '".$farmer_password."' where f_mobile = '".$f_mobile."'";
                    $result = mysqli_query($con,$query);
                    if($result){
                        echo 0;
                    }
                }
            }
        }


        else if($farmer_aadhar!=$OldData['f_aadhar']){
            //if aadhar card details get changed and aadhar card is not uploaded then print error
            if(empty($_FILES['farmer_aadharpdf'])){
                echo 2; //unique response code
            }
            else{
               //upload file and updata Data
                $farmer_aadharpdf= $f_mobile."-".$farmer_name."-".$_FILES["farmer_aadharpdf"]["name"];
                $tname1 = $_FILES["farmer_aadharpdf"]["tmp_name"];
                $target_path1 = "assets/documents/aadhar/".$farmer_aadharpdf;
                if(move_uploaded_file($tname1, $target_path1)){
                    #sql query to insert into database
                    $query = "update farmer set f_name = '".$farmer_name."', f_gender = '".$farmer_gender."', f_age = '".$farmer_age."', f_street = '".$farmer_street."', f_city = '".$farmer_city."', f_state = '".$farmer_state."', f_pincode = '".$farmer_pincode."', f_aadhar = '".$farmer_aadhar."',f_aadharpdf = '".$target_path1."', f_pan = '".$farmer_pan."', f_bankholder = '".$farmer_bankholder."', f_bankaccount = '".$farmer_bankaccount."', f_bankifsc = '".$farmer_bankifsc."', f_bankname = '".$farmer_bankname."', f_bankbranch = '".$farmer_bankbranch."', f_password = '".$farmer_password."' where f_mobile = '".$f_mobile."'";
                    $result = mysqli_query($con,$query);
                    if($result){
                        echo 0;
                    }
                }
            }
        }
        else if($farmer_pan!=$OldData['f_pan']){
            //if pan card details get changed and pan card is not uploaded then print error
            if(empty($_FILES['farmer_panpdf'])){
                echo 3; //unique response code
            }
            else{
               //upload file and updata Data
                $farmer_panpdf= $f_mobile."-".$farmer_name."-".$_FILES["farmer_panpdf"]["name"];
                $tname2 = $_FILES["farmer_panpdf"]["tmp_name"];
                $target_path2 = "assets/documents/pan/".$farmer_panpdf;
                if(move_uploaded_file($tname2, $target_path2)){
                    #sql query to insert into database
                    $query = "update farmer set f_name = '".$farmer_name."', f_gender = '".$farmer_gender."', f_age = '".$farmer_age."', f_street = '".$farmer_street."', f_city = '".$farmer_city."', f_state = '".$farmer_state."', f_pincode = '".$farmer_pincode."', f_aadhar = '".$farmer_aadhar."', f_pan = '".$farmer_pan."',f_panpdf = '".$target_path2."', f_bankholder = '".$farmer_bankholder."', f_bankaccount = '".$farmer_bankaccount."', f_bankifsc = '".$farmer_bankifsc."', f_bankname = '".$farmer_bankname."', f_bankbranch = '".$farmer_bankbranch."', f_password = '".$farmer_password."' where f_mobile = '".$f_mobile."'";
                    $result = mysqli_query($con,$query);
                    if($result){
                        echo 0;
                    }
                }
            }
        }
        else if($farmer_bankaccount!=$OldData['f_bankaccount'] || $farmer_bankholder!=$OldData['f_bankholder'] || $farmer_bankifsc!=$OldData['f_bankifsc'] || $farmer_bankname!=$OldData['f_bankname'] || $farmer_bankbranch!=$OldData['f_bankbranch']){
            //if bank det changed and pasbook not uploaded then print error
            if(empty($_FILES['farmer_bankpassbook'])){
                echo 4; //unique response code
            }
            else{
               //upload file and updata Data
                $farmer_bankpassbook= $f_mobile."-".$farmer_name."-".$_FILES["farmer_bankpassbook"]["name"];
                $tname3 = $_FILES["farmer_bankpassbook"]["tmp_name"];
                $target_path3 = "assets/documents/passbook/".$farmer_bankpassbook;
                if(move_uploaded_file($tname3, $target_path3)){
                    #sql query to insert into database
                    $query = "update farmer set f_name = '".$farmer_name."', f_gender = '".$farmer_gender."', f_age = '".$farmer_age."', f_street = '".$farmer_street."', f_city = '".$farmer_city."', f_state = '".$farmer_state."', f_pincode = '".$farmer_pincode."', f_aadhar = '".$farmer_aadhar."', f_pan = '".$farmer_pan."', f_bankholder = '".$farmer_bankholder."', f_bankaccount = '".$farmer_bankaccount."', f_bankifsc = '".$farmer_bankifsc."', f_bankname = '".$farmer_bankname."', f_bankbranch = '".$farmer_bankbranch."', f_bankpassbook = '".$target_path3."', f_password = '".$farmer_password."' where f_mobile = '".$f_mobile."'";
                    $result = mysqli_query($con,$query);
                    if($result){
                        echo 0;
                    }
                }
            }
        }
        else{
            #sql query to insert into database
            $query = "update farmer set f_name = '".$farmer_name."', f_gender = '".$farmer_gender."', f_age = '".$farmer_age."', f_street = '".$farmer_street."', f_city = '".$farmer_city."', f_state = '".$farmer_state."', f_pincode = '".$farmer_pincode."', f_aadhar = '".$farmer_aadhar."', f_pan = '".$farmer_pan."', f_bankholder = '".$farmer_bankholder."', f_bankaccount = '".$farmer_bankaccount."', f_bankifsc = '".$farmer_bankifsc."', f_bankname = '".$farmer_bankname."', f_bankbranch = '".$farmer_bankbranch."', f_password = '".$farmer_password."' where f_mobile = '".$f_mobile."'";
            $result = mysqli_query($con,$query);
            if($result){
                echo 0;
                }
        }
?>




