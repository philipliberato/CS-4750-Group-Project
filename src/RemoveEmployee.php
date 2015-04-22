

<?php

$Username = $_POST["Username"];



$con=mysqli_connect('stardock.cs.virginia.edu', 'cs4750pnl8zp', 'hospital', 'cs4750pnl8zp');
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// echo mysql_real_escape_string($con, $Username);

$status = NULL;
$message = "Operation was not successful";

if ($Username != ""){
	$status = mysqli_query($con,"DELETE FROM User WHERE Username = '$Username'");
}

if($status) { // query was successfull
$message = "Operation was successful";
}

echo "<h3 id=\"resultTxt\">Operation Results</h3>";
echo "<p id=\"resultTxt\">$message</p>";

mysqli_close($con);
  
?>


