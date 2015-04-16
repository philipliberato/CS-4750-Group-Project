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
$admin_info = mysqli_fetch_row($query);


mysqli_close($connection); // Closing Connection

?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Your Home Page</title>
<link href="admin.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
<b id="welcome">Hello, <?php echo $admin_info[2]; ?>.</b>
<br>
<p>With great power comes great responsibility. <b style="color: red;">Be careful.</b></p>
<br>
<b id="logout"><a href="logout.php">Log Out</a></b>
</div>
</body>
</html>