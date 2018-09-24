<?php 
require_once 'database_connections.php';
$data = json_decode(file_get_contents("php://input")); 
$type = mysqli_real_escape_string($con, $data->type);
$query = "INSERT into port_type (port_type) VALUES ('$type')";
mysqli_query($con,$query);
echo true;
?>