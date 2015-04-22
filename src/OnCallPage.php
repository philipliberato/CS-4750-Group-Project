<?php
//$AuthorName = "Gandhi";


$servername = "stardock.cs.virginia.edu";
$username = "cs4750pnl8zp";
$password = "hospital";
$dbname = "cs4750pnl8zp";


//$Table = "Doctor";
//echo $Table;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 




$sql = "SELECT * FROM Doctor INNER JOIN Employee ON Doctor.EmployeeID=Employee.EmployeeID Where OnCall = '1' ";
$result = $conn->query($sql);


if ($result->num_rows > 0) {

 echo "<table>";
       echo "<tr><th> Employee ID </th><th> LastName </th><th> Specialty </th><th> PhoneNumber </th></tr>";
       while($row = $result->fetch_assoc()) {
           echo "<tr>";
           echo("<td>" . $row["EmployeeID"] . "</td>\n");
           echo("<td>" . $row["LastName"] . "</td>\n");
           echo("<td>" . $row["Specialty"] . "</td>\n");
           echo("<td>" . $row["PhoneNumber"] . "</td>\n");
           echo "</tr>";
       }
       echo "</table>";

}


?>