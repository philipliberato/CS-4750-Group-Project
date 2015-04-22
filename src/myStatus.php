<?php
include('session.php');

$connection = mysqli_connect("stardock.cs.virginia.edu", "cs4750pnl8zp", "hospital", "cs4750pnl8zp");
        if (!$connection) {
	        //echo "connection failed";
        } else {
        	//echo "connection successful";
        	}
        	
session_start();// Starting Session
	
$query_s = mysqli_query($connection, "select * from Employee where userid='$ref_id'");
$status_info = mysqli_fetch_row($query_s);
$query_t_param = $status_info[0];
$lastname_d = $status_info[3];

$t_query_t = mysqli_query($connection, "select * from Doctor where employeeid='$query_t_param'");
$status_infod = mysqli_fetch_row($t_query_t);
$status_d = $status_infod[3];

$resultState = "";
$colorChoice = "";

if ($status_d == 1) {
	$resultState = "ON CALL";	
	$colorChoice = "green";
} else {
	$resultState = "NOT ON CALL";
	$colorChoice = "red";
}




mysqli_close($connection); // Closing Connection


?>

<div id="statusWrapper">

<h3 style="margin:30px;">Hello, Dr. <?php echo $lastname_d ?>. <br><br>You are currently:</h1>
<br>
<br>
<br>
<div style="background-color:<?php echo $colorChoice?>; height: 100px; width: 90%; color:white; margin-left:30px; border-radius: 5px; text-align:center; padding-top:20px; font-size:100px; font-family: 'Helvetica', sans-serif;"> 
	<?php echo $resultState ?>
</div>

</div>