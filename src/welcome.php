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
<title>Welcome, <?php echo $patient_info[2]; ?>! </title>
<link href="patient.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'>

</head>
<body>

<div id="logo">General Hospital</div>
<br>
<div id="wrapper" align="right">
    
    <div id="header-title" class="rounded-topleft6 rounded-topright6">
        <p class="rounded-topleft6 rounded-topright6">
			<div id="leftHeader">Welcome to General Hospital, <?php echo $patient_info[2]; ?>. </div>
            <div id="rightHeader"><a href="logout.php" id="logout">[Log out]</a></div>
        </p>
    </div>
    
    <div align="left" id="content-container" class="rounded-bottomleft6 rounded-bottomright6 rounded-topright6" style="overflow: hidden">
        <div id="optionsDiv">
        <br>
        <br>
	        <h4 align="center">How can we help you?</h2>
	        <div id="navcontainer">
				<ul id="navlist">
					<li id="active"><a href="#" id="current">View account</a></li>
					<li><a href="#">change password</a></li>
					<li><a href="#">view Available Rooms</a></li>
					<li><a href="#">browse On-Call Doctors</a></li>
					<li><a href="#">Contact Us</a></li>
					</ul>
		</div>
        </div>
        <div id="resultDiv">
	        <br>
	        <h3 id="resultTxt">Account Information</h3>
	        <br>
	        <br>
	        <b id="resultTxt">Name:</b> <?php echo $patient_info[2]; ?> <?php echo $patient_info[3]; ?> 
	        <br><br>
	        <b id="resultTxt">Age:</b> <?php echo date_diff(date_create($patient_info[4]), date_create('today'))->y;?>
	        <br><br>
	        <b id="resultTxt">Phone Number:</b> <?php echo $patient_info[6]; ?>
	        <br><br>
	        <b id="resultTxt">Address:</b> <?php echo $employee_info[7]; ?> <?php echo $employee_info[8]; ?>, <?php echo $employee_info[9]; ?>, <?php echo $employee_info[10]; ?> <?php echo $employee_info[11]; ?>
	        
        </div>
    </div>
    <br>
    <br>
    <br>
	<a id="aboutus" href="about.php">[about us]</a>

</div>

</body>
</html>
