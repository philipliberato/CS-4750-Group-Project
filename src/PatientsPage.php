<?php
include('session.php');

$connection = mysqli_connect("stardock.cs.virginia.edu", "cs4750pnl8zp", "hospital", "cs4750pnl8zp");
        if (!$connection) {
	        //echo "connection failed";
        } else {
        	//echo "connection successful";
        	}
        	
session_start();// Starting Session

$val = $_SESSION['employee_id'];

$general = "select * from Appointment natural join Patient where DoctorID = $val";
	
$patients = mysqli_query($connection, $general);

echo "<br><h3 id=\"resultTxt\">Your Patients</h3><br>";

while($row = mysqli_fetch_array($patients)){
	$lastN = $row[6];
	$firstN = $row[5];
	$date = $row[3];
	echo "<b id=\"resultTxt\">Patient: </b>$lastN, $firstN - $date<br>";
}

mysqli_close($connection); // Closing Connection

?>
