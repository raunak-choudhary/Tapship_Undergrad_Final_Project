<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message

        // mysqli_connect() function opens a new connection to the MySQL server.
        $con = mysqli_connect("b3bu9bb23ikjqsiv8aku-mysql.services.clever-cloud.com", "uodltp4afruoomkk", "WAniOzDcPXxfNZTCLGnl", "b3bu9bb23ikjqsiv8aku");
        $c_mobile= $con->real_escape_string($_POST['mob']);
        $c_password= $con->real_escape_string($_POST['pass']);
        $_SESSION["sessionid"] = $c_mobile;


        //chek if phone number is available or not
        $CustomerPhoneAvailCheck=$con->query("SELECT * FROM customer WHERE c_mobile=$c_mobile");
        if($CustomerPhoneAvailCheck->num_rows<1)
        {
            header("location: forgotpassword.php");
        }

        $query = "update customer set c_temppass = '$c_password' where c_mobile = $c_mobile";
        $success = $con->query($query);

        echo "<script>location.replace('forgotpasswordotp.php')</script>";
?>