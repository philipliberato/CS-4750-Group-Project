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

$RoomNumber = $_GET["RoomNumber"];

$con=mysqli_connect('stardock.cs.virginia.edu', 'cs4750pnl8zp', 'hospital', 'cs4750pnl8zp');
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



// mysqli_query($con,"INSERT INTO Room VALUES ('$RoomNumber')";


if ($RoomNumber != NULL){
mysqli_query($con,"INSERT INTO Room (RoomNumber)
VALUES ('$RoomNumber')");
}



mysqli_close($con);
  
?>


