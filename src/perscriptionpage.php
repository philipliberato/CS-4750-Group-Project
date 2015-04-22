<?php
include('session.php');

$drug_name = $_GET["DrugName"];
$fdanumber = $_GET["FDANumber"];
//$fdanumber = 123456789;


  $connection = mysqli_connect("stardock.cs.virginia.edu", "cs4750pnl8zp", "hospital", "cs4750pnl8zp");
        if (!$connection) {
	        //echo "connection failed";
        } else {
        	//echo "connection successful";
        	}
        	
session_start();// Starting Session

$query = mysqli_query($connection, "select * from Employee where userid='$ref_id'");
$employee_info = mysqli_fetch_row($query);

$sql = "INSERT INTO Medication (DrugName, FDANumber) VALUES ('$drug_name', '$fdanumber')";


$query = NULL;
if ($drug_name != NULL && $fdanumber != NULL) {
	$query = mysqli_query($connection, $sql);
}

echo "<h3 id=\"resultTxt\">Operation Results</h3>";

if($query) {
	echo "<p id=\"resultTxt\">Drug added successfully</p>";
} else {
	echo "<p id=\"resultTxt\">Error adding Drug</p>";
}

mysqli_close($connection); // Closing Connection

?>
