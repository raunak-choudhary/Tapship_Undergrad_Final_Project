<?php 
 
 include('session-script.php');
 $res = $_SESSION["sessionid"];
 $d_mobile= $res;
 if(!isset($_SESSION['login_farmer'])){
 header("location: login.php"); // Redirecting To Profile Page
 }
 error_reporting(0);
 
 
 $con = mysqli_connect("remotemysql.com", "m1t7Rrl6v7", "gIP1i7Re2y", "m1t7Rrl6v7");
   if(!$con)
   {
       die(" Connection Error ");
   }

   $cb_id = $_GET['cb_id'];

   $q = "SELECT * from cropbid where cb_id=$cb_id";

   $result = mysqli_query($con,$q);

   while( $res=mysqli_fetch_assoc($result))
   {
    $cr_id =  $res['cb_cr_id'];
    $c_mobile = $res['cb_c_mobile'];
   }

   if(isset($_POST['submit']))
   {        
    $query = " update cropsale set cr_status='10' where cr_id=$cr_id";

    $result = mysqli_query($con,$query);

    $query = " update cropbid set cb_status='10' where cb_cr_id=$cr_id and cb_c_mobile=$c_mobile and cb_id=$cb_id";
    $result = mysqli_query($con,$query);    
   }

   header("location: acceptedtransportbids.php");
   
?>
