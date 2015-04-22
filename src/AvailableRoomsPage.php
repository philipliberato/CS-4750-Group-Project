<?php
include('session.php');

$connection = mysqli_connect("stardock.cs.virginia.edu", "cs4750pnl8zp", "hospital", "cs4750pnl8zp");
        if (!$connection) {
	        //echo "connection failed";
        } else {
        	//echo "connection successful";
        	}
        	
session_start();// Starting Session
	
$availableRooms = mysqli_query($connection, "select * from Room where RoomNumber not in (select RoomNumber from Occupies)");
// $availableRooms = mysqli_fetch_row($query_s);

mysqli_close($connection); // Closing Connection

echo "<br><h3 id=\"resultTxt\">Available Rooms</h3><br><br>";

while($room = mysqli_fetch_array($availableRooms)){
	echo "<b id=\"resultTxt\">Room Number: </b>$room[0]<br>";
}

?>

