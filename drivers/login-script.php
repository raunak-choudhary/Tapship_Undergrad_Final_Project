<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
error_reporting(0);
if (isset($_POST['submit'])) 
{
    if (empty($_POST['d_mobile']) || empty($_POST['d_password'])) 
    {
        $error = "Username or Password is invalid";
    } 
    else 
    {
        // mysqli_connect() function opens a new connection to the MySQL server.
         $con = mysqli_connect("b3bu9bb23ikjqsiv8aku-mysql.services.clever-cloud.com", "uodltp4afruoomkk", "WAniOzDcPXxfNZTCLGnl", "b3bu9bb23ikjqsiv8aku");

        // Define $mobile and $password
        $d_mobile = mysqli_real_escape_string($con, $_POST['d_mobile']);
        $d_password = mysqli_real_escape_string($con,$_POST['d_password']);
        $_SESSION["sessionid"] = $_POST['d_mobile'];

        //chek if phone number is available or not
        $DriverPhoneAvailCheck=$con->query("SELECT * FROM driver WHERE d_mobile='".$d_mobile."'");
        if($DriverPhoneAvailCheck->num_rows<1)
        {
            $error="Invalid Phone Number";
        }
        else
        {
            $DriverPasswordCheck=$con->query("SELECT * FROM driver WHERE d_mobile='".$d_mobile."' AND d_password='".$d_password."'");
            if($DriverPasswordCheck->num_rows<1)
            {
            $error="Wrong Password";
            }
            else
            {
                // SQL query to fetch information of registerd users and finds user match.
                $query = "SELECT d_mobile, d_password from driver where d_mobile=? AND d_password=? LIMIT 1";
                // To protect MySQL injection for Security purpose
                $stmt = $con->prepare($query);
                $stmt->bind_param("ss", $d_mobile, $d_password);
                $stmt->execute();
                $stmt->bind_result($d_mobile, $d_password);
                $stmt->store_result();
                if ($stmt->fetch()) 
                    $_SESSION['login_driver'] = $d_mobile; // Initializing Session
                header("location: login.php"); // Redirecting To Profile Page
            }
        }
    }
    mysqli_close($con); // Closing Connection
}
?>
<!-- <html>
</html> -->
