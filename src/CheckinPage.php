<?php
//$AuthorName = "Philip Liberato";




$AppointmentID = $_GET["AppointmentID"];
$DoctorID = $_GET["DoctorID"];
$PatientID = $_GET["PatientID"];
$Date = $_GET["Date"];

$con=mysqli_connect('stardock.cs.virginia.edu', 'cs4750pnl8zp', 'hospital', 'cs4750pnl8zp');
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// NEED TO CHECK DATA TO PREVENT POSSIBILITY FOR SQL INJECTION!!!!!!

// mysqli_query($con,"INSERT INTO Room VALUES ('$RoomNumber')";




if ($DoctorID != NULL && $PatientID != NULL && $Date != NULL) {
  mysqli_query($con, "INSERT INTO Appointment (AppointmentID,DoctorID, PatientID, Date) VALUES ('$AppointmentID','$DoctorID', '$PatientID', '$Date')");
}



mysqli_close($con);
  
?>
