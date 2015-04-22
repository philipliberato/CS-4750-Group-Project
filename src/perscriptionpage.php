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

$query = mysqli_query($connection, $sql);

mysqli_close($connection); // Closing Connection

?>
