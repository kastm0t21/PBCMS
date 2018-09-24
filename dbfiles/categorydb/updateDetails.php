<?php 
require_once 'database_connections.php';
$data = json_decode(file_get_contents("php://input")); 
$id = mysqli_real_escape_string($con, $data->id);
$name = mysqli_real_escape_string($con, $data->name);
$query = "UPDATE category SET name='$name' WHERE id=$id";
mysqli_query($con, $query);
echo true;
?>