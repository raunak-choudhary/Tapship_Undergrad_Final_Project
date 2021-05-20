<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message

        // mysqli_connect() function opens a new connection to the MySQL server.
        $con = mysqli_connect("localhost", "root", "", "tapship");
        $f_mobile= $con->real_escape_string($_POST['mob']);
        $f_password= $con->real_escape_string($_POST['pass']);
        $_SESSION["sessionid"] = $f_mobile;


        //chek if phone number is available or not
        $CustomerPhoneAvailCheck=$con->query("SELECT * FROM farmer WHERE f_mobile=$f_mobile");
        if($CustomerPhoneAvailCheck->num_rows<1)
        {
            header("location: forgotpassword.php");
        }

        $query = "update farmer set f_temppass = '$f_password' where f_mobile = $f_mobile";
        $success = $con->query($query);

        echo "<script>location.replace('forgotpasswordotp.php')</script>";
?>