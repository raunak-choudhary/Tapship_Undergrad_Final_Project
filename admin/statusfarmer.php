<?php 
 
 include('session-script.php');
 $res = $_SESSION["sessionid"];
 $a_name= $res;
 if(!isset($_SESSION['login_admin'])){
 header("location: login.php"); // Redirecting To Profile Page
 }
 
 $con = mysqli_connect("localhost", "root", "", "tapship");
   if(!$con)
   {
       die(" Connection Error ");
   }

   $f_mobile = $_GET['f_mobile'];

   if(isset($_POST['accept']))
   {        
        $query = " update farmer set f_approve = '2' where f_mobile='".$f_mobile."'";
        $result = mysqli_query($con,$query);
   }
   if(isset($_POST['review']))
   {        
        $query = " update farmer set f_approve = '3' where f_mobile='".$f_mobile."'";
        $result = mysqli_query($con,$query);
   }
   if(isset($_POST['reject']))
   {        
        $query = " update farmer set f_approve = '4' where f_mobile='".$f_mobile."'";
        $result = mysqli_query($con,$query);
   }
   header("Location: farmerprofile.php?f_mobile=$f_mobile"); 
?>
