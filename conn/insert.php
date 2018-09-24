<?php
    require_once 'connection.php';
    
    $data = json_decode(file_get_contents("php://input"));

    $name = mysqli_real_escape_string($con, $data->name);
    $email = mysqli_real_escape_string($con, $data->email);
    $companyName = mysqli_real_escape_string($con, $data->companyName);

    $query = "INSERT into employee (name, email, companyName) VALUES ('$name', '$email', '$companyName')";

    mysqli_query($con, $query);
    echo true;