<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
error_reporting(0);
if (isset($_POST['submit'])) 
{
    if (empty($_POST['c_mobile']) || empty($_POST['c_password'])) 
    {
        $error = "Username or Password is invalid";
    } 
    else 
    {
        // mysqli_connect() function opens a new connection to the MySQL server.
         $con = mysqli_connect("b3bu9bb23ikjqsiv8aku-mysql.services.clever-cloud.com", "uodltp4afruoomkk", "WAniOzDcPXxfNZTCLGnl", "b3bu9bb23ikjqsiv8aku");

        // Define $mobile and $password
        $c_mobile = mysqli_real_escape_string($con, $_POST['c_mobile']);
        $c_password = mysqli_real_escape_string($con,$_POST['c_password']);
        $_SESSION["sessionid"] = $_POST['c_mobile'];

        //chek if phone number is available or not
        $CustomerPhoneAvailCheck=$con->query("SELECT * FROM customer WHERE c_mobile='".$c_mobile."'");
        if($CustomerPhoneAvailCheck->num_rows<1)
        {
            $error="Invalid Phone Number";
        }
        else
        {
            $CustomerPasswordCheck=$con->query("SELECT * FROM customer WHERE c_mobile='".$c_mobile."' AND c_password='".$c_password."'");
            if($CustomerPasswordCheck->num_rows<1)
            {
            $error="Wrong Password";
            }
            else
            {
                // SQL query to fetch information of registerd users and finds user match.
                $query = "SELECT c_mobile, c_password from customer where c_mobile=? AND c_password=? LIMIT 1";
                // To protect MySQL injection for Security purpose
                $stmt = $con->prepare($query);
                $stmt->bind_param("ss", $c_mobile, $c_password);
                $stmt->execute();
                $stmt->bind_result($c_mobile, $c_password);
                $stmt->store_result();
                if ($stmt->fetch()) 
                    $_SESSION['login_customer'] = $c_mobile; // Initializing Session
                header("location: login.php"); // Redirecting To Profile Page
            }
        }
    }
    mysqli_close($con); // Closing Connection
}
?>
<!-- <html>
</html> -->
