<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
error_reporting(0);
if (isset($_POST['submit'])) 
{
    if (empty($_POST['f_mobile']) || empty($_POST['f_password'])) 
    {
        $error = "Username or Password is invalid";
    } 
    else 
    {
        // mysqli_connect() function opens a new connection to the MySQL server.
        $con = mysqli_connect("127.0.0.1", "root", "", "tapship");

        // Define $mobile and $password
        $f_mobile = mysqli_real_escape_string($con, $_POST['f_mobile']);
        $f_password = mysqli_real_escape_string($con,$_POST['f_password']);
        $_SESSION["sessionid"] = $_POST['f_mobile'];

        //chek if phone number is available or not
        $FarmerPhoneAvailCheck=$con->query("SELECT * FROM farmer WHERE f_mobile='".$f_mobile."'");
        if($FarmerPhoneAvailCheck->num_rows<1)
        {
            $error="Invalid Phone Number";
        }
        else
        {
            $FarmerPasswordCheck=$con->query("SELECT * FROM farmer WHERE f_mobile='".$f_mobile."' AND f_password='".$f_password."'");
            if($FarmerPasswordCheck->num_rows<1)
            {
            $error="Wrong Password";
            }
            else
            {
                $_SESSION['login_farmer'] = $f_mobile;
                header("location: login.php");
            }
        }
    }
    mysqli_close($con); // Closing Connection
}
?>
<!-- <html>
</html> -->