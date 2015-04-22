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

$whichTable = $_GET['choice'];


$xml = new SimpleXMLElement('<xml/>');


switch ($whichTable) {
	case "Administrator":
		
		$query_e = mysqli_query($connection, "select * from Administrator");

		$usera = $xml->addChild('Administrators');
		
		while ($data_admin = mysqli_fetch_array($query_e, MYSQL_NUM)) {
			
			$user = $usera->addChild('Administrator');
			$user->addChild('EmployeeID', $data_admin[0]);
			$user->addChild('LastLogin', $data_admin[1]);
		}
	
		Header('Content-type: text/xml');
		
		$dom = new DOMDocument('1.0');
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($xml->asXML());
		echo $dom->saveXML();
		
		break;
	case "Appointment":
	
		$query_e = mysqli_query($connection, "select * from Appointment");

		$usera = $xml->addChild('Appointments');
		
		while ($data_admin = mysqli_fetch_array($query_e, MYSQL_NUM)) {
			
			$user = $usera->addChild('Appointment');
			$user->addChild('AppointmentID', $data_admin[0]);
			$user->addChild('DoctorID', $data_admin[1]);
			$user->addChild('PatientID', $data_admin[2]);
			$user->addChild('Date', $data_admin[3]);
		}
	
		Header('Content-type: text/xml');
		
		$dom = new DOMDocument('1.0');
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($xml->asXML());
		echo $dom->saveXML();
		
		break;
	case "Department":

	$query_e = mysqli_query($connection, "select * from Department");

		$user = $xml->addChild('Departments');
		
		while ($data_admin = mysqli_fetch_array($query_e, MYSQL_NUM)) {
			
			$usera = $user->addChild('Department');
			$usera->addChild('Name', $data_admin[0]);
		}
	
		Header('Content-type: text/xml');
		
		$dom = new DOMDocument('1.0');
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($xml->asXML());
		echo $dom->saveXML();
	
		break;
	case "Doctor":

		$query_e = mysqli_query($connection, "select * from Doctor");

		$usera = $xml->addChild('Doctors');
		
		while ($data_admin = mysqli_fetch_array($query_e, MYSQL_NUM)) {
			
			$user = $usera->addChild('Doctor');
			$user->addChild('EmployeeID', $data_admin[0]);
			$user->addChild('Specialty', $data_admin[1]);
			$user->addChild('LicenseNumber', $data_admin[2]);
			$user->addChild('OnCall', $data_admin[3]);
		}
	
		Header('Content-type: text/xml');
		
		$dom = new DOMDocument('1.0');
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($xml->asXML());
		echo $dom->saveXML();

		break;
	case "Employee":

	$query_e = mysqli_query($connection, "select * from Employee");

		$user = $xml->addChild('Employees');
		
		while ($data_admin = mysqli_fetch_array($query_e, MYSQL_NUM)) {

			$usera = $user->addChild('Employee');
			$usera->addChild('EmployeeID', $data_admin[0]);			
			$usera->addChild('UserID', $data_admin[1]);
			$usera->addChild('FirstName', $data_admin[2]);
			$usera->addChild('LastName', $data_admin[3]);
			$usera->addChild('DateOfBirth', $data_admin[4]);
			$usera->addChild('Email', $data_admin[5]);
			$usera->addChild('PhoneNumber', $data_admin[6]);
			$usera->addChild('StreetNumber', $data_admin[7]);
			$usera->addChild('StreetName', $data_admin[8]);
			$usera->addChild('City', $data_admin[9]);
			$usera->addChild('State', $data_admin[10]);
			$usera->addChild('Zipcode', $data_admin[11]);
			
		}
	
		Header('Content-type: text/xml');
		
		$dom = new DOMDocument('1.0');
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($xml->asXML());
		echo $dom->saveXML();

		break;
	case "Medication":
	
	$query_e = mysqli_query($connection, "select * from Medication");

		$usera = $xml->addChild('Medications');
		
		while ($data_admin = mysqli_fetch_array($query_e, MYSQL_NUM)) {
			
			$user = $usera->addChild('Medication');
			$user->addChild('DrugName', $data_admin[0]);
			$user->addChild('FDANumber', $data_admin[1]);
			
		}
	
		Header('Content-type: text/xml');
		
		$dom = new DOMDocument('1.0');
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($xml->asXML());
		echo $dom->saveXML();
	
		break;
	case "Nurse":
	
	$query_e = mysqli_query($connection, "select * from Nurse");

		$usera = $xml->addChild('Nurses');
		
		while ($data_admin = mysqli_fetch_array($query_e, MYSQL_NUM)) {
			
			$user = $usera->addChild('Nurse');
			$user->addChild('EmployeeID', $data_admin[0]);
			$user->addChild('LicenseNumber', $data_admin[1]);
			$user->addChild('Department', $data_admin[2]);
		}
	
		Header('Content-type: text/xml');
		
		$dom = new DOMDocument('1.0');
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($xml->asXML());
		echo $dom->saveXML();
	
		break;
	case "Occupies":

	$query_e = mysqli_query($connection, "select * from Occupies");

		$usera = $xml->addChild('RoomsOccupied');
		
		while ($data_admin = mysqli_fetch_array($query_e, MYSQL_NUM)) {
			
			$user = $usera->addChild('Record');
			$user->addChild('OccupationNumber', $data_admin[0]);
			$user->addChild('RoomNumber', $data_admin[1]);
			$user->addChild('PatientID', $data_admin[2]);
		}
	
		Header('Content-type: text/xml');
		
		$dom = new DOMDocument('1.0');
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($xml->asXML());
		echo $dom->saveXML();
		break;
	case "Patient":

	$query_e = mysqli_query($connection, "select * from Patient");

		$user = $xml->addChild('Patients');
		
		while ($data_admin = mysqli_fetch_array($query_e, MYSQL_NUM)) {

			$usera = $user->addChild('Patient');
			$usera->addChild('PatientID', $data_admin[0]);			
			$usera->addChild('UserID', $data_admin[1]);
			$usera->addChild('FirstName', $data_admin[2]);
			$usera->addChild('LastName', $data_admin[3]);
			$usera->addChild('SSN', $data_admin[4]);
			$usera->addChild('PhoneNumber', $data_admin[5]);
			$usera->addChild('StreetNumber', $data_admin[6]);
			$usera->addChild('StreetName', $data_admin[7]);
			$usera->addChild('City', $data_admin[8]);
			$usera->addChild('State', $data_admin[9]);
			$usera->addChild('Zipcode', $data_admin[10]);
			$usera->addChild('VitalStatus', $data_admin[11]);
			
		}
	
		Header('Content-type: text/xml');
		
		$dom = new DOMDocument('1.0');
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($xml->asXML());
		echo $dom->saveXML();
	

		break;
	case "Pharmacist":

		$query_e = mysqli_query($connection, "select * from Pharmacist");

		$usera = $xml->addChild('Pharmacists');
		
		while ($data_admin = mysqli_fetch_array($query_e, MYSQL_NUM)) {
			
			$user = $usera->addChild('Pharmacist');
			$user->addChild('EmployeeID', $data_admin[0]);
			$user->addChild('LicenseNumber', $data_admin[1]);
			
		}
	
		Header('Content-type: text/xml');
		
		$dom = new DOMDocument('1.0');
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($xml->asXML());
		echo $dom->saveXML();

		break;
	case "Receptionist":
		
			$query_e = mysqli_query($connection, "select * from Receptionist");

		$usera = $xml->addChild('Receptionists');
		
		while ($data_admin = mysqli_fetch_array($query_e, MYSQL_NUM)) {
			
			$user = $usera->addChild('Receptionist');
			$user->addChild('EmployeeID', $data_admin[0]);
			$user->addChild('Department', $data_admin[1]);
			
		}
	
		Header('Content-type: text/xml');
		
		$dom = new DOMDocument('1.0');
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($xml->asXML());
		echo $dom->saveXML();
		
		break;
	case "Record":

		$query_e = mysqli_query($connection, "select * from Record");

		$usera = $xml->addChild('Records');
		
		while ($data_admin = mysqli_fetch_array($query_e, MYSQL_NUM)) {
			
			$user = $usera->addChild('Record');
			$user->addChild('RecordID', $data_admin[0]);
			$user->addChild('PatientID', $data_admin[1]);
			$user->addChild('VisitDate', $data_admin[2]);
			$user->addChild('Height', $data_admin[3]);
			$user->addChild('Weight', $data_admin[4]);
			$user->addChild('BloodPressure', $data_admin[5]);
			
		}
	
		Header('Content-type: text/xml');
		
		$dom = new DOMDocument('1.0');
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($xml->asXML());
		echo $dom->saveXML();
		
		break;
	case "Room":
	
		$query_e = mysqli_query($connection, "select * from Room");

		$usera = $xml->addChild('Rooms');
		
		while ($data_admin = mysqli_fetch_array($query_e, MYSQL_NUM)) {
			
			$user = $usera->addChild('Room');
			$user->addChild('RoomNumber', $data_admin[0]);
			
		}
	
		Header('Content-type: text/xml');
		
		$dom = new DOMDocument('1.0');
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($xml->asXML());
		echo $dom->saveXML();
	
		break;
	case "User":
	
		$query_e = mysqli_query($connection, "select * from User");

		$usera = $xml->addChild('Users');
		
		while ($data_admin = mysqli_fetch_array($query_e, MYSQL_NUM)) {
			
			$user = $usera->addChild('User');
			$user->addChild('Username', $data_admin[0]);
			$user->addChild('UserID', $data_admin[1]);
			$user->addChild('AccountCreationDate', $data_admin[1]);
		}
	
		Header('Content-type: text/xml');
		
		$dom = new DOMDocument('1.0');
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($xml->asXML());
		echo $dom->saveXML();
		
	
		break;
	default:
		print("you picked nothing asshole");
}

/*
for ($i = 1; $i <= 8; ++$i) {
    $track = $xml->addChild('track');
    $track->addChild('path', "song$i.mp3");
    $track->addChild('title', "Track $i - Track Title");
}

Header('Content-type: text/xml');
print($xml->asXML());
*/


mysqli_close($connection); // Closing Connection

?>