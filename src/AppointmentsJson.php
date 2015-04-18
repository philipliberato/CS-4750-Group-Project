
<?php


//header('Content-type:application/json');


con = mysqli_connect('stardock.cs.virginia.edu', 'cs4750pnl8zp', 'hospital', 'cs4750pnl8zp') or die (mysqli_error());


$select = mysqli_query(con,"SELECT * FROM doctor");

$rows = array();


while ($row= mysqli_fetch_array($select))
{
	$rows[] = $row;
}

echo json_encode($rows);


?>