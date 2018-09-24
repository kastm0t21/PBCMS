<?php 
require_once 'database_connections.php';
$data = json_decode(file_get_contents("php://input")); 
$slot = mysqli_real_escape_string($con, $data->slot);
$query = "INSERT into port_slot (slot) VALUES ('$slot')";
mysqli_query($con,$query);
echo true;
?>