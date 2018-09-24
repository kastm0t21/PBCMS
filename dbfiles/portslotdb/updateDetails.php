<?php 
require_once 'database_connections.php';
$data = json_decode(file_get_contents("php://input")); 
$id = mysqli_real_escape_string($con, $data->id);
$slot = mysqli_real_escape_string($con, $data->slot);
$query = "UPDATE port_slot SET slot='$slot' WHERE id='$id'";
mysqli_query($con, $query);
echo true;
?>