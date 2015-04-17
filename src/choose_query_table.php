<?php
include('session.php');

echo "<br><h3 id=\"resultTxt\">Choose Query Table</h3><br>";

$table_names = array("Administrator", "Appointment", "Department", "Doctor", "Employee", "Medication", "Nurse", "Occupies", "Patient", "Pharmacist", "Receptionist", "Record", "Room", "User");

echo "<form action=\"\">";

foreach ($table_names as $value) {
    echo "<input id=\"resultTxt\" type=\"radio\" name=\"Table\" value=\"$value\">$value<br>";
}

echo "<br><input type=\"submit\" value=\"Submit\">";
echo "</form>";

?>
