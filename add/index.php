<?php
header('Content-Type: application/json');

$mysqli = new mysqli("localhost","pi","robots","inventory");
// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

// Perform query
$barcode = $_GET['barcode'];
$name = $_GET['name'];
$supplier = $_GET['supplier'];
$part = $_GET['part'];
$cost = $_GET['cost'];
$stock = $_GET['stock'];
$robot = $_GET['robot'];
$testing = $_GET['testing'];
$create = $_GET['print'];
if ($_GET['print']) {
  system('cd /home/pi;python3 barcode.py h;');
  system('sudo chown pi /dev/usb/lp0;echo "$barcode" > /dev/usb/lp0;');
}
$sql = "INSERT INTO parts (barcode, name, supplier, part, cost, qty_stock, qty_robot, qty_testing) VALUES ('$barcode','$name','$supplier','$part',$cost,$stock,$robot,$testing)";
if ($mysqli -> query($sql) === TRUE) {
  echo '{"sucess":true}';
  header('Location: /?i=Success!');
}
elseif (strpos($mysqli->error,'Duplicate')!== false) {
	header('Location: /?e=Error: duplicate key!');
}
else {
	echo 'error: '.$sql.PHP_EOL.$mysqli->error;
}
//echo json_encode($res,JSON_PRETTY_PRINT);
$mysqli -> close();

?>
