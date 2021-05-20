<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message

        // mysqli_connect() function opens a new connection to the MySQL server.
        $con = mysqli_connect("localhost", "root", "", "tapship");
        $d_mobile= $con->real_escape_string($_POST['mob']);
        $d_password= $con->real_escape_string($_POST['pass']);
        $_SESSION["sessionid"] = $d_mobile;


        //chek if phone number is available or not
        $CustomerPhoneAvailCheck=$con->query("SELECT * FROM driver WHERE d_mobile=$d_mobile");
        if($CustomerPhoneAvailCheck->num_rows<1)
        {
            header("location: forgotpassword.php");
        }

        $query = "update driver set d_temppass = '$d_password' where d_mobile = $d_mobile";
        $success = $con->query($query);

        echo "<script>location.replace('forgotpasswordotp.php')</script>";
?>