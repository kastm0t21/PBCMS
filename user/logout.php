<?php 
//Close the connection to DB
//    include("login.php");
    $cookie_name = "user";
    unset($_COOKIE['user']);
    $res = setcookie($cookie_name, '', time() - 50000, '/');
	session_start();
    session_destroy();
    echo "<script>alert('Successfully Logged Out.'); 
        window.location = '../index.php'; 
        </script>";  
    exit(); 
?>