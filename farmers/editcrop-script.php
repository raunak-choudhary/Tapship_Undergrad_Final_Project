<?php 
 
 include('session-script.php');
 $res = $_SESSION["sessionid"];
 $f_mobile= $res;
 if(!isset($_SESSION['login_farmer'])){
 header("location: login.php"); // Redirecting To Profile Page
 }
 
$con=mysqli_connect("localhost","root","","tapship");
    $cr_id = $con->real_escape_string($_POST['id']);
    $cr_mep = $con->real_escape_string($_POST['mep']);
    $cr_quantity= $con->real_escape_string($_POST['quantity']); 

    $query = " update cropsale set cr_mep=$cr_mep, cr_quantity=$cr_quantity where cr_id=$cr_id";
    echo $query;
    $result = mysqli_query($con,$query); 
    
    $cr_id=round((double)$cr_id*525325.24*6537838239.89);
    $id = base64_encode($cr_id);

   header("location: viewcrop.php?id=$id");
   
?>
