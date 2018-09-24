<?php  
    session_start();
    include_once("../conn/connection.php");
//    include("../session.php");
    extract($_POST);

$userName = mysqli_real_escape_string($conn,$_POST['userName']);
$password = mysqli_real_escape_string($conn,md5($_POST['password']));
$firstName = mysqli_real_escape_string($conn,$_POST['firstName']);
$lastName = mysqli_real_escape_string($conn,$_POST['lastName']);
if(isset($_POST['userName']) and isset($_POST['password']))
{
//Check if valid username and password
	$q = "SELECT * FROM login WHERE userName = '$userName' AND password = '$password'";
	$res = mysqli_query($conn,$q) or die(mysqli_error());
    $count = mysqli_num_rows($res);
    $row = mysqli_fetch_array($res);
    if($count == 1)
    {
        $cookie_val = $row['userId'];
        $cookie_name = "user";
        setcookie($cookie_name, $cookie_val, time() + (86400), "/"); //86400 = 1 day
//if(isset($_COOKIE['user'])) {
    echo "login";
//}
    }
    else
            {
             echo "Invalid Username or Password!";
             }
}
//include("update.php");
//$login = new php();
//$login->login();
?>