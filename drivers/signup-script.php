<?php

$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "tapship";

	//Create Connection
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);

if (isset($_POST["submit"]))
 {
     #retrieve file title
     $farmer_mobile = $conn->real_escape_string($_POST['farmer_mobile']);
     $farmer_name = $conn->real_escape_string($_POST['farmer_name']);
     $farmer_gender = $conn->real_escape_string($_POST['farmer_gender']);
     $farmer_age = $conn->real_escape_string($_POST['farmer_age']);
     $farmer_street = $conn->real_escape_string($_POST['farmer_street']);
     $farmer_city = $conn->real_escape_string($_POST['farmer_city']);
     $farmer_state= $conn->real_escape_string($_POST['farmer_state']);
     $farmer_pincode= $conn->real_escape_string($_POST['farmer_pincode']);
     $farmer_aadhar= $conn->real_escape_string($_POST['farmer_aadhar']);
     $farmer_pan= $conn->real_escape_string($_POST['farmer_pan']);
     $farmer_password= $conn->real_escape_string($_POST['farmer_password']);
     $farmer_approve = 1;
     
    #file name with a random number so that similar dont get replaced
     $farmer_aadharpdf= $farmer_mobile."-".rand(1000,10000)."-".$_FILES["farmer_aadharpdf"]["name"];
     $farmer_panpdf= $farmer_mobile."-".rand(1000,10000)."-".$_FILES["farmer_panpdf"]["name"];
     $farmer_photo= $farmer_mobile."-".rand(1000,10000)."-".$_FILES["farmer_photo"]["name"];

    #temporary file name to store file
    $tname1 = $_FILES["farmer_aadharpdf"]["tmp_name"];
    $tname2 = $_FILES["farmer_panpdf"]["tmp_name"];
    $tname3 = $_FILES["farmer_photo"]["tmp_name"];

     #target path
     $target_path1 = "assets/documents/aadhar/".$farmer_aadharpdf;
     $target_path2 = "assets/documents/pan/".$farmer_panpdf;
     $target_path3 = "assets/documents/photo/".$farmer_photo;
   
    #TO move the uploaded file to specific location
    move_uploaded_file($tname1, $target_path1);
    move_uploaded_file($tname2, $target_path2);
    move_uploaded_file($tname3, $target_path3);

    #sql query to insert into database
    $query = "INSERT into farmer(f_mobile,f_name,f_gender,f_age,f_street,f_city,f_state,f_pincode,f_aadhar,f_aadharpdf,f_pan,f_panpdf,f_photo,f_password,f_approve) VALUES('$farmer_mobile','$farmer_name','$farmer_gender','$farmer_age','$farmer_street','$farmer_city','$farmer_state','$farmer_pincode','$farmer_aadhar','$target_path1','$farmer_pan','$target_path2','$target_path3','$farmer_password','$farmer_approve')";
    $success = $conn->query($query);
 
    if (!$success){
        die("Couldnt enter data: ".$conn->error);
        echo "error";
    }
    else{
        echo "done";
    }
}
 
$conn->close();
 
?>
