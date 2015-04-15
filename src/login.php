<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is empty";
    } else {
        // Define $username and $password
        $username   = $_POST['username'];
        $password   = $_POST['password'];
        
        // Establishing Connection with Server by passing server_name, user_id and password as a parameter
        $connection = mysqli_connect("stardock.cs.virginia.edu", "cs4750pnl8zp", "hospital", "cs4750pnl8zp");
        if (!$connection) {
//	        echo "connection failed";
        } else {
//        	echo "connection successful";
        	}
        
        // To protect MySQL injection for Security purpose
        $username   = stripslashes($username);
        $password   = stripslashes($password);
        $username   = mysqli_real_escape_string($connection, $username);
        $password   = mysqli_real_escape_string($connection, $password);
        
        // SQL query to fetch information of registerd users and finds user match.
        $query      = mysqli_query($connection, "select * from User where password='$password' and username='$username'");
        $rows       = mysqli_num_rows($query);
        
       if ($rows == 1) {
            $_SESSION['login_user'] = $username; // Initializing Session
            header("location: welcome.php"); // Redirecting To Other Page
        } else { 
        $error = "Username or Password is invalid."; 
        }
        
        mysqli_close($connection); // Closing Connection
    }
}