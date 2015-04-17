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
