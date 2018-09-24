<?php 
require_once 'database_connections.php';
$data = json_decode(file_get_contents("php://input")); 
$id = mysqli_real_escape_string($con, $data->id);
$type = mysqli_real_escape_string($con, $data->type);
$query = "UPDATE port_type SET port_type='$type' WHERE id='$id'";
mysqli_query($con, $query);
echo true;
?>