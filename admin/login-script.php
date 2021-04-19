 <?php
    session_start(); // Starting Session
    $error = ''; // Variable To Store Error Message
    if (isset($_POST['submit'])) {
        if (empty($_POST['a_name']) || empty($_POST['a_password'])) {
            $error = "Username or Password is invalid";
        } else {
            // Define $mobile and $password
            $a_name = $_POST['a_name'];
            $a_password = $_POST['a_password'];
            $_SESSION["sessionid"] = $_POST['a_name'];
            // mysqli_connect() function opens a new connection to the MySQL server.
            $con = mysqli_connect("127.0.0.1", "root", "", "tapship");
            // SQL query to fetch information of registerd users and finds user match.
            $query = "SELECT a_name, a_password from admin where a_name=? AND a_password=? LIMIT 1";
            // To protect MySQL injection for Security purpose
            $stmt = $con->prepare($query);
            $stmt->bind_param("ss", $a_name, $a_password);
            $stmt->execute();
            $stmt->bind_result($a_name, $a_password);
            $stmt->store_result();
            if ($stmt->fetch()) //fetching the contents of the row {
                $_SESSION['login_admin'] = $a_name; // Initializing Session
            header("location: login.php"); // Redirecting To Profile Page
        }
        mysqli_close(); // Closing Connection
    }
    ?>
