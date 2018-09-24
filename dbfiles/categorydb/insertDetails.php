<?php 
require_once 'database_connections.php';
$data = json_decode(file_get_contents("php://input")); 
$name = mysqli_real_escape_string($con, $data->name);
// $email = mysqli_real_escape_string($con, $data->email);
// $gender = mysqli_real_escape_string($con, $data->gender);
// $address = mysqli_real_escape_string($con, $data->address);
// print_r($data);
$query = "INSERT into category (name) VALUES ('$name')";
mysqli_query($con, $query);
echo true;
?>