<?php
include_once("../conn/connection.php");
$userName = mysqli_real_escape_string($conn,$_POST['userName']);
$password = mysqli_real_escape_string($conn,md5($_POST['password']));
$firstName = mysqli_real_escape_string($conn,$_POST['firstName']);
$lastName = mysqli_real_escape_string($conn,$_POST['lastName']);
extract($_POST);
    if(count($_POST)>0) {
    
//Update query
	if ($_POST["password"] == ""){
		echo "Please Input a valid Password";
	 }
	 else
	 {       
		mysqli_query($conn,"UPDATE login set password='" .md5($password). "' WHERE userId='" .$userId. "'") or die (mysqli_error());
     echo "Successfully updated!";
     }
}
