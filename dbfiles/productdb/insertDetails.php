<?php 
require_once 'database_connections.php';
$data = json_decode(file_get_contents("php://input")); 
// $target_dir = "../../images/";
$ASIN = $_POST['ASIN'];
$name = $_POST['name'];
$url = $_POST['url'];
$quantity = $_POST['quantity'];
$color = $_POST['color'];
$size = $_POST['size'];
$price = $_POST['price'];
$type = $_POST['type'];
$category = $_POST['category'];
$collection = $_POST['collection'];
// $target_file = $target_dir . basename($_FILES["file"]["name"]);
// $location = "images/";
// $image = $location . basename($_FILES["file"]["name"]);
$query = "INSERT into product (ASIN, name, url, quantity, color, size, price, type, category, collection) VALUES 
('$ASIN', '$name', '$url', '$quantity', '$color', '$size', '$price', '$type', '$category', '$collection')";
// $move = move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
// if ($move){
    if (mysqli_query($con, $query) === TRUE){
        echo "Successfully Registered!";
    }
    else {
        echo "Error: ". mysqli_error($con);
    }
// }
// else if($_FILES["file"]["error"] == 1){
//     echo "File is too large. Please select another image.";
// }
// else if ($_FILES["file"]["error"] == 4){
//     echo "Please select an image.";
// }
// else{
//     echo "File upload failed. Please try again.";
// }

?>