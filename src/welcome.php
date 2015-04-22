<?php
include('session.php');

// a - professional/doctor
// b - pharmacist
// c - nurse
// d - patient
$admin = "cs4750pnl8zp";
$doctor = "cs4750pnl8zpa"; // professional
$pharmacist = "cs4750pnl8zpb";
$nurse = "cs4750pnl8zpc";
$patient = "cs4750pnl8zpd";
$receptionist = "cs4750pnl8zpe";

$connection = mysqli_connect("stardock.cs.virginia.edu", $admin, "hospital", "cs4750pnl8zp");
        	
session_start(); // Starting Session

$navOptions = array();
$first_name = "FirstName";
$last_name = "LastName";

if($permission < 6) {
     $query = mysqli_query($connection, "select * from Employee where userid='$ref_id'");
     $employee_info = mysqli_fetch_row($query);
}

switch($permission) { // need to change some of the user IDs to employee IDs
     case 1:
	// echo "admin";
	$query = mysqli_query($connection, "select * from Employee where userid='$ref_id'");
	$admin_info = mysqli_fetch_row($query);
	$adminOptions = array("View account", "View Users", "add New Employee", "Remove Employee", "View Rooms", "Export Data");
	$navOptions = $adminOptions;
	$first_name = $admin_info[2];
	$last_name = $admin_info[3];
	break;
     case 2:
	// echo "doctor";
	$query = mysqli_query($connection, "select * from Employee where userid='$ref_id'");
	$doctor_info = mysqli_fetch_row($query);
	$doctorOptions = array("View account", "change password", "my patients", "view on call status");
	$navOptions = $doctorOptions;
	$first_name = $doctor_info[2];
	$last_name = $doctor_info[3];
	break;
     case 3:
	// echo "nurse";
	$query = mysqli_query($connection, "select * from Employee where userid='$ref_id'");
	$nurse_info = mysqli_fetch_row($query);
	$nurseOptions = array("View account", "change password");
	$navOptions = $nurseOptions;
	$first_name = $nurse_info[2];
	$last_name = $nurse_info[3];
	break;
     case 4:
	// echo "pharmacist";
	$query = mysqli_query($connection, "select * from Employee where userid='$ref_id'");
	$pharmacist_info = mysqli_fetch_row($query);
	$pharmacistOptions = array("View account", "change password", "make prescription");
	$navOptions = $pharmacistOptions;
	$first_name = $pharmacist_info[2];
	$last_name = $pharmacist_info[3];
	break;
     case 5:
	// echo "receptionist";
	$query = mysqli_query($connection, "select * from Employee where userid='$ref_id'");
	$receptionist_info = mysqli_fetch_row($query);
	$receptionistOptions = array("View account", "change password", "check in patient", "check out patient");
	$navOptions = $receptionistOptions;
	$first_name = $receptionist_info[2];
	$last_name = $receptionist_info[3];
	break;
     case 6:
	// echo "patient";
	$query = mysqli_query($connection, "select * from Patient where userid='$ref_id'");
	$patient_info = mysqli_fetch_row($query);
	$patientOptions = array("View account", "change password", "view Available Rooms", "browse On-Call Doctors", "Contact Us");
	$navOptions = $patientOptions;
	$first_name = $patient_info[2];
	$last_name = $patient_info[3];
	break;
     default:
	echo "ERROR";
}

mysqli_close($connection); // Closing Connection

?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Welcome!</title>
<?php
if($permission == 1) {
     $wordArt = "Admin";
     echo "<link href=\"admin.css\" rel=\"stylesheet\" type=\"text/css\">";
} elseif($permission == 6) {
     $wordArt = "Patient";
     echo "<link href=\"patient.css\" rel=\"stylesheet\" type=\"text/css\">";
} else {
     $wordArt = "Professional";
     echo "<link href=\"professional.css\" rel=\"stylesheet\" type=\"text/css\">";
} 
?>
<link href='http://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'>

</head>
<body>

<?php
echo "<div id=\"logo\">General Hospital<a style=\"color:#522402;\">$wordArt</a></div>";
?>
<br>
<div id="wrapper" align="right">
    
    <div id="header-title" class="rounded-topleft6 rounded-topright6">
        <p class="rounded-topleft6 rounded-topright6">
			<div id="leftHeader">Welcome to General Hospital, <?php echo $first_name; ?>. </div>
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
				<?php
				     foreach($navOptions as $option) {
					echo "<li><a href=\"#\">$option</a></li>";
				     }
				?>
					<!-- <li id="active"><a href="#" id="current">View account</a></li> -->
				</ul>
		</div>
        </div>
        <div id="resultDiv">
	        <br>
	        <h3 id="resultTxt">Account Information</h3>
	        <br>
	        <br>
	        <b id="resultTxt">Name:</b> <?php echo $first_name; ?> <?php echo $last_name; ?> 
	        <br><br>

	<?php
	     if($permission == 6) {
	        echo "<b id=\"resultTxt\">Age: </b>";
		echo date_diff(date_create($patient_info[4]), date_create('today'))->y;
		echo "<br><br>";
	        echo "<b id=\"resultTxt\">Email: </b>$patient_info[5]<br><br>";
	        echo "<b id=\"resultTxt\">Phone Number: </b>$patient_info[6]<br><br>";
	        echo "<b id=\"resultTxt\">Address: </b> $patient_info[7] $patient_info[8] $patient_info[9], $patient_info[10] $patient_info[11]";
	     } else {
	        echo "<b id=\"resultTxt\">Email: </b>$employee_info[5]<br><br>";
	        echo "<b id=\"resultTxt\">Phone Number: </b>$employee_info[6]<br><br>";
	        echo "<b id=\"resultTxt\">Address: </b> $employee_info[7] $employee_info[8] $employee_info[9], $employee_info[10] $employee_info[11]";
	     }
	?>
	        
        </div>
    </div>
    <br>
    <br>
    <br>
	<a id="aboutus" href="about.php">[about us]</a>

</div>

</body>
</html>
