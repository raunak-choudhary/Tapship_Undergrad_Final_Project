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
        $con = mysqli_connect("b3bu9bb23ikjqsiv8aku-mysql.services.clever-cloud.com", "uodltp4afruoomkk", "WAniOzDcPXxfNZTCLGnl", "b3bu9bb23ikjqsiv8aku");

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
                // SQL query to fetch information of registerd users and finds user match.
                $query = "SELECT f_mobile, f_password from farmer where f_mobile=? AND f_password=? LIMIT 1";
                // To protect MySQL injection for Security purpose
                $stmt = $con->prepare($query);
                $stmt->bind_param("ss", $f_mobile, $f_password);
                $stmt->execute();
                $stmt->bind_result($f_mobile, $f_password);
                $stmt->store_result();
                if ($stmt->fetch()) 
                    $_SESSION['login_farmer'] = $f_mobile; // Initializing Session
                header("location: login.php"); // Redirecting To Profile Page
            }
        }
    }
    mysqli_close($con); // Closing Connection
}
?>
<!-- <html>
</html> -->