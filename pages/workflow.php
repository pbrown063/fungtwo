<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/wtfung/includes/bootstrap.inc';
echo "WORKFLOW...and some drop down populated with database info :D<br><br>";
echo "PHASES<br>";
echo" <select name='phase'>";
$mysqli = sql_connect();
	
$phase = "SELECT phaseName FROM phaseLibrary";

$sql = mysqli_query($mysqli, $phase) or die(mysqli_error($mysqli));

while ($row = $sql->fetch_assoc()){
echo "<option value='phase'>" . $row["phaseName"] . "</option>";
}
echo "<select>";