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




$sql = "SELECT * FROM Room";
$result = $conn->query($sql);


if ($result->num_rows > 0) {

 echo "<br><table id=\"resultTxt\">";
       echo "<tr><th> RoomNumber </th></tr>";
       while($row = $result->fetch_assoc()) {
           echo "<tr>";
           echo("<td>" . $row["RoomNumber"] . "</td>\n");
           echo "</tr>";
       }
       echo "</table><br>";

}


?>
