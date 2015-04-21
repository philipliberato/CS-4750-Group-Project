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


?>

<h3 id="resultTxt">Export Data & Information</h3<br>
<h5 style="margin-left: 30px;">Choose a table, then select export to get the raw data</h5>
<div id="exportDataWrapper">
	<div id="e_chosen" style="float: left; width: 170px; margin-top: 0px; padding-left: 15px; padding-top: 0px;">
		<!--start phpscript!-->
		
		<?php
include('session.php');

$Operation = $_GET["op"];

echo "<p id=\"resultTxt\"> <i>Select Table</i></p>";

$table_names = array("Administrator", "Appointment", "Department", "Doctor", "Employee", "Medication", "Nurse", "Occupies", "Patient", "Pharmacist", "Receptionist", "Record", "Room", "User");


foreach ($table_names as $value) {
    echo "<input id=\"resultTxt\" type=\"radio\" name=\"Table\" value=\"$value\">$value<br>";
}

echo "<br><input type=\"submit\" value=\"Get Raw Data\" onclick=\"getRawData();\">";
echo "</form>";

?>
		
		<!--end phpscript!-->
	</div>
	<div id="e_data" style="float: right; width: 75%; height:90%;">
		<textarea id="rawData" rows="25" cols="80">Your export data will appear here.</textarea>
	</div>
</div>

<script type=text/javascript>
	function getRawData() {
		var userChose = $('input[name=Table]:checked').val();
		if (!userChose) {
			userChose = 'Please select a table!';
		} else {
			console.log('userChose: '+ userChose);
			var oReq = new XMLHttpRequest(); //New request object
			
			oReq.onload = function() {
				userChose = this.responseText;
			};
			
			oReq.open("get", "getXMLData.php", true);
			oReq.send();
		}
		$('#rawData').val(userChose);
	}
</script>
