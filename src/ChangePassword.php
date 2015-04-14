<?php
//$AuthorName = "Gandhi";
$password = $_GET["password"];
$User = $_GET["User"];

$con=mysqli_connect("stardock.cs.virginia.edu","cs4750pnl8zp","hospital","cs4750pnl8zp");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if ($password != NULL){
mysqli_query($con, "UPDATE User SET Password = '$password'
WHERE Username='$User'");
}




mysqli_close($con);
  
?>