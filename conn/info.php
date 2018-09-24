<?php
    require_once 'connection.php';
    $query = "SELECT * from employee";
    $result = mysqli_query($con, $query);
    $arr = array();
    if(mysqli_num_rows($result) !=0) {
        while($row = mysqli_fetch_assoc($result)){
            $arr[] = $row;
        }
    }
    echo $json_info = json_encode($arr);