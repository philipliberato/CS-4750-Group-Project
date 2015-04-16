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


mysqli_close($connection); // Closing Connection


?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Welcome, <?php echo $employee_info[2]; ?></title>
<link href="professional.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'>
</head>
<body>

<div id="logo">General Hospital <a style="color:#522402;">Professional</a></div>
<br>
<div id="wrapper" align="right">
    
    <div id="header-title" class="rounded-topleft6 rounded-topright6">
        <p class="rounded-topleft6 rounded-topright6">
			<div id="leftHeader">Welcome back,<b> <?php echo $employee_info[2]; ?></b>!</div>
            <div id="rightHeader"><a href="logout.php" id="logout">[Log out]</a></div>
        </p>
    </div>
    
    <div align="left" id="content-container" class="rounded-bottomleft6 rounded-bottomright6 rounded-topright6" style="overflow: hidden">
        <div id="optionsDiv">
        <br>
        <br>
	        <h4 align="center">What would you like to do today?</h2>
	        <div id="navcontainer">
				<ul id="navlist">
					<li id="active"><a href="#" id="current">View account information</a></li>
					<li><a href="#">Query Data</a></li>
					<li><a href="#">Insert Data</a></li>
					<li><a href="#">Update Data</a></li>
					<li><a href="#">Delete Data</a></li>
					</ul>
		</div>
        </div>
        <div id="resultDiv">
	        <br>
	        <h3 id="resultTxt">Account Information</h3>
	        <br>
	        <br>
	        <b id="resultTxt">Name:</b> <?php echo $employee_info[2]; ?> <?php echo $employee_info[3]; ?> 
	        <br><br>
	        <b id="resultTxt">Age: </b><?php echo date_diff(date_create($employee_info[4]), date_create('today'))->y;?>
	        <br><br>
	        <b id="resultTxt">Email:</b> <?php echo $employee_info[5]; ?>
	        <br><br>
	        <b id="resultTxt">Phone Number:</b> <?php echo $employee_info[6]; ?>
	        <br><br>
	        <b id="resultTxt">Address:</b> <?php echo $employee_info[7]; ?> <?php echo $employee_info[8]; ?>, <?php echo $employee_info[9]; ?>, VA
	        
        </div>
    </div>    

</div>
  <br>
    <br>
    <br>
	<a id="aboutus" href="about.php">[about us]</a>

</body>
</html>
