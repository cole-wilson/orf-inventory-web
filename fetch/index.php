<?php
header('Content-Type: application/json');

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
  // echo json_encode($result->fetch_assoc(),JSON_PRETTY_PRINT);
  // Free result set
  $result -> free_result();
}
echo json_encode($res,JSON_PRETTY_PRINT);
$mysqli -> close();
?>
