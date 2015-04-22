<?php
include('session.php');

        $connection = mysqli_connect("stardock.cs.virginia.edu", "cs4750pnl8zp", "hospital", "cs4750pnl8zp");
        if (!$connection) {
	        //echo "connection failed";
        } else {
        	//echo "connection successful";
        	}
        	
session_start();// Starting Session

$query = mysqli_query($connection, "select * from Employee where userid='$ref_id'");
$employee_info = mysqli_fetch_row($query);

$result = mysqli_query($connection, "SELECT * FROM User");

mysqli_close($connection); // Closing Connection


echo '<h2 id="resultTxt">Users</h2><br>';

echo "<table>";
echo "<tr><th> UserName </th><th> User ID </th><th> Account Creation Date </th></tr>";
while($row = $result->fetch_assoc()) {
   echo "<tr>";
   echo("<td>" . $row["Username"] . "</td>\n");
   echo("<td>" . $row["UserID"] . "</td>\n");
   echo("<td>" . $row["AccountCreationDate"] . "</td>\n");
   echo "</tr>";
}
echo "</table>";

?>



