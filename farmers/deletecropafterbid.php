<?php 
 
 include('session-script.php');
 $res = $_SESSION["sessionid"];
 $f_mobile= $res;
 if(!isset($_SESSION['login_farmer'])){
 header("location: login.php"); // Redirecting To Profile Page
 }
 
 $con = mysqli_connect("localhost", "root", "", "tapship");

$id = $_GET['id'];
        
$cr_id=base64_decode($id);
$cr_id=round((double)$cr_id/525325.24/6537838239.89);

    $query = " update cropsale set cr_status='13' where cr_id=$cr_id";
    $query1 = " update cropbid set cb_status='13' where cb_cr_id=$cr_id";
    echo $query;
    $result = mysqli_query($con,$query); 
    $result = mysqli_query($con,$query1); 

   header("location: activecrop.php?id=$id");
   
?>
