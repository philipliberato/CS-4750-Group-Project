<?php





//$AuthorName = "Gandhi";
$password = $_GET["password"];
$User = $_GET["User"];



$con=mysqli_connect("stardock.cs.virginia.edu","cs4750pnl8zp","hospital","cs4750pnl8zp");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// $query = mysqli_query($con, "select * from Employee where userid='$ref_id'");
// $employee_info = mysqli_fetch_row($query);

// $UserID = $employee_info[1];

// $sql = "SELECT Username FROM User Where UserID='$UserID'";
// $User = mysqli_query($con, $sql);

if ($password != NULL){
mysqli_query($con, "UPDATE User SET Password = '$password'
WHERE Username='$User'");
}




mysqli_close($con);
  
?>