<!-- // <?php
// //$AuthorName = "Gandhi";

// // $UserName = $_GET["username"];
// // $Password = $_GET["password"];
// // $EmployeeID = $_GET["EmployeeID"];
// // $firstName = $_GET["firstName"];
// // $lastName = $_GET["lastName"];
// // $DOB = $_GET["DOB"];
// // $email = $_GET["email"];
// // $license = $_GET["license"];
// // $phoneNumber = $_GET["phoneNumber"];
// // $streetNumber = $_GET["streetNumber"];
// // $StreetName = $_GET["streetName"];
// // $city = $_GET["city"];
// // $zipCode = $_GET["zipCode"];

// $RoomNumber = $_GET["RoomNumber"];

// $con=mysqli_connect('stardock.cs.virginia.edu', 'cs4750pnl8zp', 'hospital', 'cs4750pnl8zp');
// // Check connection


// if (mysqli_connect_errno()) {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
// }


// echo "hello"


// // if ($UserName != NULL){
// // mysqli_query($con,"INSERT INTO Employee (EmployeeID, UserID, FirstName, LastName, DateOfBirth, Email, PhoneNumber, StreetNum, StreetName, City, Zip)
// // VALUES ('$EmployeeID', '12', '$firstName','$lastName', '$DOB', '$email', '$phoneNumber','$streetNumber', '$streetName', '$city', '$zipCode )");
// // }


// mysqli_close($con);
  
// ?> -->

<?php
//$AuthorName = "Gandhi";

$EmployeeType = $_POST["EmployeeType"];
$Username = $_POST["Username"];
$FirstName = $_POST["FirstName"];
$LastName = $_POST["LastName"];

// echo $EmployeeType;
// echo $Username;
// echo $FirstName;
// echo $LastName;

$con=mysqli_connect('stardock.cs.virginia.edu', 'cs4750pnl8zp', 'hospital', 'cs4750pnl8zp');
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// mysqli_query($con,"INSERT INTO Room VALUES ('$RoomNumber')";

$status = NULL;
$message = "Operation was not successful";

if ($EmployeeType != NULL && $Username != ""){
$status = mysqli_query($con,"INSERT INTO User (Username) VALUES ('$Username')");
	if($status) {
		$UserID = mysqli_query($con,"SELECT * FROM User WHERE Username = '$Username'");
		$UserID = mysqli_fetch_row($UserID);
		// echo $UserID[1];
		$status = $status && mysqli_query($con,"INSERT INTO Employee (UserID, FirstName, LastName) VALUES ('$UserID[1]', '$FirstName', '$LastName')");

		if($status) {
		$EmployeeID = mysqli_query($con,"SELECT * FROM Employee WHERE UserID = '$UserID[1]'");
		$EmployeeID = mysqli_fetch_row($EmployeeID);
		// echo $EmployeeID[0];
		$status1 = $status && mysqli_query($con,"INSERT INTO $EmployeeType (EmployeeID) VALUES ('$EmployeeID[0]')");
		}
	}
}

if($status) { // query was successfull
$message = "Operation was successful";
}

echo "<h3 id=\"resultTxt\">Operation Results</h3>";
echo "<p id=\"resultTxt\">$message</p>";

mysqli_close($con);
  
?>


