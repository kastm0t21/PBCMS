<?php 
    require_once 'database_connections.php';
    $data = json_decode(file_get_contents("php://input")); 
    $query = "UPDATE port_slot SET deleted=1 WHERE id=$data->del_id";
    mysqli_query($con, $query);
    echo true;
?>