<?php 

include('session-script.php');
$res = $_SESSION["sessionid"];
$a_name= $res;
if(!isset($_SESSION['login_admin'])){
header("location: login.php"); // Redirecting To Profile Page
}

     $con = mysqli_connect("b3bu9bb23ikjqsiv8aku-mysql.services.clever-cloud.com", "uodltp4afruoomkk", "WAniOzDcPXxfNZTCLGnl", "b3bu9bb23ikjqsiv8aku");
    if(!$con)
    {
        die(" Connection Error ");
    }

    if(isset($_POST['update']))
    {
        
        $a_name = $_GET['a_name'];
        $a_nameupdate = $_POST['a_name'];
        $a_password = $_POST['a_password'];

        $query = " update admin set a_name = '".$a_nameupdate."',a_password = '".$a_password."' where a_name='".$a_name."'";
        $result = mysqli_query($con,$query); 
    }
    header("location: logout-script.php");
?>
