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

if (isset($_POST['submit'])) {
	if (isset($_POST['options'])) {
		$whichTable = $_POST['options'];
	}
} else {
	$whichTable = "nothing";
}

print("table chosen: ")

$xml = new SimpleXMLElement('<xml/>');

switch ($whichTable) {
	case "Room":
		print("picked room");
		break;
	default:
		print("picked: "+ $whichTable);
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