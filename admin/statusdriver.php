<?php 
 
 include('session-script.php');
 $res = $_SESSION["sessionid"];
 $a_name= $res;
 if(!isset($_SESSION['login_admin'])){
 header("location: login.php"); // Redirecting To Profile Page
 }
 
 $con = mysqli_connect("remotemysql.com", "m1t7Rrl6v7", "gIP1i7Re2y", "m1t7Rrl6v7");
   if(!$con)
   {
       die(" Connection Error ");
   }

   $d_mobile = $_GET['d_mobile'];

   if(isset($_POST['accept']))
   {        
        $query = " update driver set d_approve = '2' where d_mobile='".$d_mobile."'";
        $result = mysqli_query($con,$query);
   }
   if(isset($_POST['review']))
   {        
        $query = " update driver set d_approve = '3' where d_mobile='".$d_mobile."'";
        $result = mysqli_query($con,$query);
   }
   if(isset($_POST['reject']))
   {        
        $query = " update driver set d_approve = '4' where d_mobile='".$d_mobile."'";
        $result = mysqli_query($con,$query);
   }
   header("Location: driverprofile.php?d_mobile=$d_mobile"); 
?>
