<?php
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename=replicator.csv');
header('Expires: 0');

$mysqli = new mysqli("localhost","pi","robots","replicator");
// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

// Perform query
if ($result = $mysqli -> query("SELECT * FROM items")) {
  $res = array();
  while ($row = $result -> fetch_assoc()) {
    $res[] = $row;
  }
  $result -> free_result();
}

// Format
$output = array();
array_push($output,array_keys($res[0]));
foreach ($res as $row) {
	array_push($output,array_values($row));
}
$file = fopen("php://output","w");
foreach ($output as $line) {
	fputcsv($file,$line);
}
fclose($file);
$mysqli -> close();
?>
