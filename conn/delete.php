<?php
    require_once 'connection.php';
    $data = json_decode(file_get_contents("php://input"));
    $query = "DELETE FROM employee WHERE id=$data->del_id";
    mysqli_query($con, $query);
    echo true;