<?php
include('session.php');

        $connection = mysqli_connect("stardock.cs.virginia.edu", "cs4750pnl8zp", "hospital", "cs4750pnl8zp");
        if (!$connection) {
	        //echo "connection failed";
        } else {
        	//echo "connection successful";
        	}
        	
session_start();// Starting Session

$query = mysqli_query($connection, "select * from Patient where userid='$ref_id'");
$patient_info = mysqli_fetch_row($query);


mysqli_close($connection); // Closing Connection

?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Your Home Page</title>
<link href="patient.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
<b id="welcome">Welcome to General Hospital <?php echo $patient_info[2]; ?>. <i>What would you like to do today?</i></b>
<br>
<b id="logout"><a href="logout.php">Log Out</a></b>


</div>
</body>
</html>