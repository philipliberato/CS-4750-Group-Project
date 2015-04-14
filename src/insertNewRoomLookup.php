<?php
//$AuthorName = "Gandhi";

$RoomNumber = $_GET["RoomNumber"];

$con=mysqli_connect('stardock.cs.virginia.edu', 'cs4750pnl8zp', 'hospital', 'cs4750pnl8zp');
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



// mysqli_query($con,"INSERT INTO Room VALUES ('$RoomNumber')";


if ($RoomNumber != NULL){
mysqli_query($con,"INSERT INTO Room (RoomNumber)
VALUES ('$RoomNumber')");
}



mysqli_close($con);
  
?>