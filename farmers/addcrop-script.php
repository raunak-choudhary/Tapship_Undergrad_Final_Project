<?php
//error_reporting(0);
$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "tapship";

	//Create Connection
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);

if (isset($_POST["submit"]))
 {
                #retrieve file title
                $crop_type = $conn->real_escape_string($_POST['crop_type']);
                $crop_name = $conn->real_escape_string($_POST['crop_name']);
                $crop_quantity = $conn->real_escape_string($_POST['crop_quantity']);
                $crop_mep = $conn->real_escape_string($_POST['crop_mep']);

                $sql = "Select * from cropdetails where cro_type='$crop_type' and cro_name='$crop_name'";
                $query = mysqli_query($conn,$sql);
               
                while($res = mysqli_fetch_array($query)){
                                $crop_cro_id = $res['cro_id'];
                }
    
                #file name with a random number so that similar dont get replaced
                $crop_img1= rand(10,10000)."-".$crop_type."-".$crop_name."-".$_FILES["crop_img1"]["name"];
                $crop_img2= rand(10,10000)."-".$crop_type."-".$crop_name."-".$_FILES["crop_img2"]["name"];
                $crop_img3= rand(10,10000)."-".$crop_type."-".$crop_name."-".$_FILES["crop_img3"]["name"];

                #temporary file name to store file
                $tname1 = $_FILES["crop_img1"]["tmp_name"];
                $tname2 = $_FILES["crop_img2"]["tmp_name"];
                $tname3 = $_FILES["crop_img3"]["tmp_name"];

                #target path
                $target_path1 = "assets/documents/crop/".$crop_img1;
                $target_path2 = "assets/documents/crop/".$crop_img2;
                $target_path3 = "assets/documents/crop/".$crop_img3;
            
                #TO move the uploaded file to specific location
                move_uploaded_file($tname1, $target_path1);
                move_uploaded_file($tname2, $target_path2);
                move_uploaded_file($tname3, $target_path3);

                $date = date("Y - m - d"); 
                echo $date;

                $query = "INSERT into cropsale(cr_cro_id,cr_quantity,cr_mep,cr_img1,cr_img2,cr_img3, cr_date) VALUES('$crop_cro_id','$crop_quantity','$crop_mep','$target_path1','$target_path2','$target_path3',$date)";
                $success = $conn->query($query);

}
 
$conn->close();
 
?>