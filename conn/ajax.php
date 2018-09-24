<?php

require_once ' config.php';

if(isset($_POST['type']) && !empty(isset($_POST['type'] ) ) ){
    $type = $_POST['type'];

    switch($type) {
        case "save_user":
        save_user($mysqli);
        break;

        case "delete_user":
        delete_user($mysqli, $_POST['id']);
        break;

        case "getUser":
        getUser($mysqli);
        break;

        default:
        invalidRequest();
    }
}else{
    invalidRequest();
}

function save_user($mysqli){
    try{
        $data = aray();
        $name = $mysqli->real_escape_string(isset($_POST['user']['name']) ? $_POST['user']['name'] : '');
        $companyName = $mysqli->real_escape_string(isset($_POST['user']['companyName']) ? $_POST['user']['companyName'] : '');
        $id = $mysqli->real_escape_string(isset($_POST['user']['id']) ? $_POST['user']['id'] : '');

        if($name == '' || $companyName = '') {
            throw new Exception("Required fields missing, Please enter and submit");
        }

        if(empty($id)) {
            $query = "INSERT INTO employee (`id`, `name`, `companyName`) VALUES (NULL, '$name', '$companyName')";
        }else{
            $query = "UPDATE employee SET `name` = '$name', `companyName` = '$companyName' WHERE `employee`.`id` = '$id'";
        }

        if($mysqli->query($query)){
            $data['success']= true;
            if(!empty($id))$data['message'] = 'User updated successfully.';
            else $data['message'] = 'User successfully added.';
            if(empty($id))$data['id'] = (int) $mysqli->insert_id;
            else $data['id'] = (int) $id;
        }else{
           throw new Exception ($mysqli->sqlstate.' - '. $mysqli->error); 
        }
        $mysqli->close();
        echo json_encode($data);
        exit;
    }
    catch(Exception $e){
        $data = array();
        $data['success'] = false;
        $data['message'] = $e->getMessage();
        echo json_encode($data);
        exit;
    }
}

function getUsers($mysqli){
    try{

        $query = "SELECT * FROM `employee` order by id desc limit 8";
        $result = $mysqli->query($query);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $row['id'] = (int) $row['id'];
            $data['data'][] = $row;
        }
        $data['success'] = true;
        echo json_encode($data);
        exit;
    }
    catch(Exception $e){
        $data = array();
        $data['success'] = false;
        $data['message'] = $e->getMessage();
        echo json_encode($data);
        exit;
    }
}

function delete_user($mysqli, $id = ''){
    try{
        
    }
}

function invalidRequest() {
    $data = array();
    $data['success'] = false;
    $data['message'] = "Invalid request.";
    echo json_encode($data);
}

