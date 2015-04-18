<?php
//$AuthorName = "Gandhi";


function lookupCourse($DoctorID) {
 // echo "ANYTHING";
  $db_connection = new mysqli('stardock.cs.virginia.edu', 'cs4750pnl8zpa', 'spring2015', 'cs4750pnl8zp');
  if (mysqli_connect_errno()) {
      echo "Connection Error!";
      return;
  }

  //echo "Connection made!";

  $stmt = $db_connection->stmt_init();
  if($stmt->prepare("select EmployeeID, Specialty, LicenseNumber, OnCall from Doctor where EmployeeID=? ")) {
      $stmt->bind_param("s", $DoctorID);
      $stmt->execute();
      $stmt->bind_result($EmployeeID, $Specialty, $LicenseNumber, $OnCall);
      echo "<table>";
      echo "<tr><th> EmployeeID </th><th> Specialty </th><<th> LicenseNumber </th><th> OnCall </th></tr>";
      while($stmt->fetch()) {
          echo "<tr>";
          echo("<td>" . $EmployeeID . "</td>\n");
          echo("<td>" . $Specialty . "</td>\n");
          echo("<td>" . $LicenseNumber . "</td>\n");
          echo("<td>" . $OnCall. "</td>\n");
          echo "</tr>";
      }
      echo "</table>";

  }
}

$DoctorID = $_GET["DoctorID"];

echo "$DoctorID";

//lookupCourse($AuthorName);
lookupCourse($DoctorID);

?>