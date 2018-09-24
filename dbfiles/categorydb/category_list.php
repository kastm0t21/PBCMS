<?php 
require_once 'database_connections.php';
$data = json_decode(file_get_contents("php://input")); 
$name = mysqli_real_escape_string($con, $data->name);
// $email = mysqli_real_escape_string($con, $data->email);
// $gender = mysqli_real_escape_string($con, $data->gender);
// $address = mysqli_real_escape_string($con, $data->address);
$category = [];
$q=mysqli_query($con,"select * from product_category");
if($q){
    while($data=mysqli_fetch_assoc($q)){
        array_push($category);
    }
}
print_r(json_encode($category));
?>