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

$Operation = $_GET["op"];
$Table = $_POST["Table"];

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
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script>
function loadQueryPage() {
    $("#resultDiv").load('choose_table.php?op=Query');
}
function loadInsertPage() {
    $("#resultDiv").load('choose_table.php?op=Insert');
}
function loadProfilePage() {
    $("#resultDiv").load('ProfilePage.php');
}
function loadUpdatePage() {
    $("#resultDiv").load('choose_table.php?op=Update');
}
function loadDeletePage() {
    $("#resultDiv").load('choose_table.php?op=Delete');
}
</script>
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
					<li id="active"><a href="#" id="current" onclick="loadProfilePage();">View account information</a></li>
					<li><a href="#" onclick="loadQueryPage();">Query Data</a></li>
					<li><a href="#" onclick="loadInsertPage();">Insert Data</a></li>
					<li><a href="#" onclick="loadUpdatePage();">Update Data</a></li>
					<li><a href="#" onclick="loadDeletePage();">Delete Data</a></li>
				</ul>
		</div>
        </div>
        <div id="resultDiv">
	        <br>
		<?php
	        echo "<h3 id=\"resultTxt\">$Operation - $Table</h3>";

		if($Operation == "Query") {

		include "Appointments.php";

		} elseif($Operation == "Insert" || $Operation == "Update") {
			$Labels = array();
			switch ($Table) {
		    	    case "Administrator":
				echo "need to figure out operations";
				break;
			    case "Appointment":
				$Labels = array("DoctorID", "PatientID", "Date");
				break;
			    case "Department":
				$Labels = array("0", "1", "2");
				break;
		    	    case "Doctor":
				$Labels = array("0", "1", "2");
				break;
			    case "Employee":
				$Labels = array("0", "1", "2");
				break;
			    case "Medication":
				$Labels = array("0", "1", "2");
				break;
		    	    case "Nurse":
				$Labels = array("0", "1", "2");
				break;
			    case "Occupies":
				$Labels = array("0", "1", "2");
				break;
			    case "Patient":
				$Labels = array("0", "1", "2");
				break;
		    	    case "Pharmacist":
				$Labels = array("0", "1", "2");
				break;
			    case "Receptionist":
				$Labels = array("0", "1", "2");
				break;
			    case "Record":
				$Labels = array("0", "1", "2");
				break;
		    	    case "Room":
				$Labels = array("0", "1", "2");
				break;
			    case "User":
				$Labels = array("0", "1", "2");
				break;
			    default:
				echo "default";
			}


		echo "<form id=\"resultTxt\" action=\"#\" method=\"post\">";

		foreach ($Labels as $label) {
		    echo "<input type=\"text\" name=\"$label\"> $label<br><br>";
		}

		echo "<br><input type=\"submit\" value=\"Submit\">";
		echo "</form>";


		} else {
		     echo "delete";
		}

	        ?>
        </div>
    </div>    

</div>


</body>
</html>
