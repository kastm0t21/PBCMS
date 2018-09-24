<?php
include_once("../conn/connection.php");
$userName = mysqli_real_escape_string($conn,$_POST['userName']);
$password = mysqli_real_escape_string($conn,md5($_POST['password']));
$firstName = mysqli_real_escape_string($conn,$_POST['firstName']);
$lastName = mysqli_real_escape_string($conn,$_POST['lastName']);
extract($_POST);
    if(count($_POST)>0) {
    
//Update query
	if ($_POST["firstName"] == "" || $_POST["lastName"] == ""){
		echo "Please Complete the your Name";
	 }
	 else
	 {
		mysqli_query($conn,"UPDATE login set firstName='" .$firstName. "', lastName='" .$lastName. "' WHERE userId='" .$userId. "'") or die (mysqli_error());
     echo "Successfully updated!";
     }
}