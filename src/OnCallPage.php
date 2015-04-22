<?php include('session.php'); ?>
<div id="statusWrapper">

<h3 style="margin:30px;">Available Physicians: </h1>
<br>
<div style="margin-left:30px; font-family: 'Helvetica', sans-serif;"> 
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
       echo "<tr><th> Last Name<br> </th><th> Specialty </th><th> PhoneNumber </th></tr><br>";
       while($row = $result->fetch_assoc()) {
           echo "<tr>";
           echo("<td>Dr. " . $row["LastName"] . "</td>\n");
           echo("<td>" . $row["Specialty"] . "</td>\n");
           echo("<td>" . $row["PhoneNumber"] . "</td>\n");
           echo "</tr>";
       }
       echo "</table>";

}


?>
<br>
<br>
<p>If you see your preferred physician on this list, please feel free to come in to try and schedule a walk-in appointment with them. Though the hospital is open 24/7, it can be hard to get a hold of a doctor, let alone your favorite one. That's why General Hospital is here to help!</p>
	
	</div>
</div>