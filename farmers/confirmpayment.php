<?php 
 
 include('session-script.php');
 $res = $_SESSION["sessionid"];
 $f_mobile= $res;
 if(!isset($_SESSION['login_farmer'])){
 header("location: login.php"); // Redirecting To Profile Page
 }
 error_reporting(0);
 
 
 $con = mysqli_connect("remotemysql.com", "m1t7Rrl6v7", "gIP1i7Re2y", "m1t7Rrl6v7");

   $cr_id = $_GET['cr_id'];

   if(isset($_POST['submit']))
   {        
    $query1 = " update cropsale set cr_status='4' where cr_id=$cr_id";
    $result = mysqli_query($con,$query1);
    echo $query1;

    $query2 = " update cropbid set cb_status='4' where cb_cr_id=$cr_id and cb_f_mobile=$f_mobile and cb_status='3'";
    $result = mysqli_query($con,$query2);    
   }

   header("location: activecrop.php");
   
?>
