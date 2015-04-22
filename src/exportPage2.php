<?php
$con=mysqli_connect("stardock.cs.virginia.edu","cs4750pnl8zp","hospital","cs4750pnl8zp");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * FROM Appointment INNER JOIN Patient ON Appointment.PatientID = Patient.PatientID";
$result=mysqli_query($con,$sql);

// Associative array
$row=mysqli_fetch_assoc($result);

printf ($row["AppointmentID"]);
printf(" ");
printf ($row["DoctorID"]);
printf(" ");
printf(" ");
printf ($row["FirstName"]);
printf(" ");
printf ($row["LastName"]);
printf(" ");
printf ($row["Date"]);
printf(" ");
printf ($row["DateOfBirth"]);
printf(" ");

//printf ("%s (%s)\n",$row["AppointmentID"],$row["DoctorID"]);

// Free result set
mysqli_free_result($result);

mysqli_close($con);
?>