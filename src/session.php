
<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect('stardock.cs.virginia.edu', 'cs4750pnl8zp', 'hospital', 'cs4750pnl8zp');
  if (mysqli_connect_errno()) {
      echo "Connection Error!";
      return;
  } else {
	  echo "connected!";
  }
// Selecting Database
$db = mysqli_select_db("User", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query("select username from login where username='$user_check'", $connection);
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['Username'];
if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
header('Location: index.html'); // Redirecting To Home Page
}
?>