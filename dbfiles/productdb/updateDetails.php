<?php 
require_once 'database_connections.php';
$data = json_decode(file_get_contents("php://input")); 
// $id = mysqli_real_escape_string($con, $data->id);
// $name = mysqli_real_escape_string($con, $data->name);
// $category_id = mysqli_real_escape_string($con, $data->category_id);
// $slot_id = mysqli_real_escape_string($con, $data->slot_id);
// $type_id = mysqli_real_escape_string($con, $data->type_id);
// print_r($data);
$target_dir = "../../images/";
$id = $_POST['id'];
$name = $_POST['name'];
$category_id = $_POST['category_id'];
$slot_id = $_POST['slot_id'];
$type_id = $_POST['type_id'];

$target_file = $target_dir . basename($_FILES["file"]["name"]);
$location = "../../images/";
$image = $location . basename($_FILES["file"]["name"]);

$query = "UPDATE product SET name='$name', image='$image', category_id='$category_id', slot_id='$slot_id', type_id='$type_id' WHERE id='$id'";
$move = move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
// mysqli_query($con, $query);

if ($move){
    if (mysqli_query($con, $query) === TRUE){
        echo "Successfully Updated!";
    }
    else {
        echo "Error: ". mysqli_error($con);
    }
}
else if($_FILES["file"]["error"] == 1){
    // echo $_FILES["file"]["error"];
    echo "File is too large. Please select another image.";
}
else if ($_FILES["file"]["error"] == 4){
    echo "Please select an image.";
}
else{
    echo "File upload failed. Please try again.";
}
?>