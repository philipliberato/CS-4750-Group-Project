<?php
//$AuthorName = "Gandhi";
$coursePassedIn = $_GET["DoctorName"];
function lookupCourse($AuthorName) {
 // echo "ANYTHING";
  $db_connection = new mysqli('stardock.cs.virginia.edu', 'cs4750pnl8zp', 'hospital', 'cs4750pnl8zp');
  if (mysqli_connect_errno()) {
      echo "Connection Error!";
      return;
  }

  //echo "Connection made!";

  $stmt = $db_connection->stmt_init();
  if($stmt->prepare("select * FROM DoctorTable")) {
      $stmt->bind_param("s", $DoctorName);
      $stmt->execute();
      $stmt->bind_result($EmployeeID, $Specialty, $Publications, $LicenseNumber, $OnCall);
      echo "<table>";
      echo "<tr><th> EmployeeID </th><th> Specialty </th><th> Publications </th><th> LicenseNumber </th><th> OnCall </th></tr>";
      while($stmt->fetch()) {
          echo "<tr>";
          echo("<td>" . $EmployeeID . "</td>\n");
          echo("<td>" . $Specialty . "</td>\n");
          echo("<td>" . $Publications . "</td>\n");
          echo("<td>" . $LicenseNumber . "</td>\n");
          echo("<td>" . $OnCall. "</td>\n");
          echo "</tr>";
      }
      echo "</table>";

  }
}

$coursePassedIn = $_GET["DoctorName"];

//lookupCourse($AuthorName);
lookupCourse($coursePassedIn);

?>