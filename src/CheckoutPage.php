<?php
$servername = "stardock.cs.virginia.edu";
$username = "cs4750pnl8zp";
$password = "hospital";
$dbname = "cs4750pnl8zp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$FieldValue = $_GET["AppointmentID"];
$Table = "Appointment"; 
$FieldName = "AppointmentID";

// sql to delete a record
$sql = "DELETE FROM $Table WHERE $FieldName=$FieldValue";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>