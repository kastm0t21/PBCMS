<?php
include_once("../conn/connection.php");
$userName = mysqli_real_escape_string($conn,$_POST['userName']);
$password = mysqli_real_escape_string($conn,md5($_POST['password']));
$firstName = mysqli_real_escape_string($conn,$_POST['firstName']);
$lastName = mysqli_real_escape_string($conn,$_POST['lastName']);
extract($_POST);
if(count($_POST)>0) {
    
//Update query
	if ($_POST["userName"] == ""){
		echo "Please Input a valid Username";
	 }
	 else
	 {
        if(count($_POST)>0) {
             $sql = "SELECT * FROM login WHERE userName = '$userName'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)!=0) {
                echo "Username Already Exists.";
            }
          else {
		mysqli_query($conn,"UPDATE login set userName='" .$userName. "' WHERE userId='" .$userId. "'") or die (mysqli_error());
     echo "Successfully updated!";
         }
	   }
     }
}