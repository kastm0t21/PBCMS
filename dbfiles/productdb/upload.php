<?php
    // include_once "database_connections.php";
     $target_dir = "../../images/";
    //  $name = $_POST['name'];
    //  print_r($_FILES);
     $target_file = $target_dir . basename($_FILES["file"]["name"]);

     move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

//      if (is_uploaded_file($_FILES['file']['name'])) {
//    echo "File ". $_FILES['file']['name'] ." uploaded successfully.\n";
//    echo "Displaying contents\n";
//    readfile($_FILES['file']['name']);
// } else {
//    echo "Possible file upload attack: ";
//    echo "filename '". $_FILES['file']['name'] . "'.";
// }


    //  // Create connection
    //  $conn = new mysqli("localhost", "root", "ast3dial", "PBX_configurator");
    //  // Check connection
    //  if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    //  }

    //  $location = "images/";

    // $sql = "INSERT INTO image (filename) VALUES (concat('".$location."','".basename($_FILES["file"]["name"])."'))";
    // // $sql = "INSERT INTO image (name,filename) VALUES ('".$name."', '".basename($_FILES["file"]["name"])."')";


    //  if ($conn->query($sql) === TRUE) {
    //      echo json_encode($_FILES["file"]); // new file uploaded
    //  } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    //  }

    //  $conn->close();

?>