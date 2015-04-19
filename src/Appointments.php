<?php
//$AuthorName = "Gandhi";


// function lookupCourse($PatientID) {
//  // echo "ANYTHING";
//   $db_connection = new mysqli('stardock.cs.virginia.edu', 'cs4750pnl8zp', 'hospital', 'cs4750pnl8zp');
//   if (mysqli_connect_errno()) {
//       echo "Connection Error!";
//       return;
//   }


// //   $stmt = $db_connection->stmt_init();
// //   if($stmt->prepare("select * from Appointment where PatientID=? ")) {
// //       $stmt->bind_param("s", $PatientID);
// //       $stmt->execute();
// //       $stmt->bind_result($AppointmentID, $DoctorID, $PatientID, $Date);
// //       echo "<table>";
// //       echo "<tr><th> AppointmentID </th><th> DoctorID </th><<th> PatientID </th><th> Date</th></tr>";
// //       while($stmt->fetch()) {
// //           echo "<tr>";
// //           echo("<td>" . $AppointmentID . "</td>\n");
// //           echo("<td>" . $DoctorID . "</td>\n");
// //           echo("<td>" . $PatientID . "</td>\n");
// //           echo("<td>" . $Date. "</td>\n");
// //           echo "</tr>";
// //       }
// //       echo "</table>";

// //   }
// // }



$servername = "stardock.cs.virginia.edu";
$username = "cs4750pnl8zp";
$password = "hospital";
$dbname = "cs4750pnl8zp";

echo $Table;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM $Table";
$result = $conn->query($sql);

//echo "$result";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo ": " . $row["Username"]. " - Name: " . $row["UserID"]. " " . $row["Password"]. " " . $row["AccountCreationDate"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();





// $PatientID = $_GET["patientID"];

// //lookupCourse($AuthorName);
// lookupCourse($PatientID);





?>
