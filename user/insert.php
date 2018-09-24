<?php
include_once("../conn/connection.php");
$userName = mysqli_real_escape_string($conn,$_POST['userName']);
$password = mysqli_real_escape_string($conn,md5($_POST['password']));
$firstName = mysqli_real_escape_string($conn,$_POST['firstName']);
$lastName = mysqli_real_escape_string($conn,$_POST['lastName']);
if (isset($_POST)){
    
	extract($_POST);
	if ($_POST["userName"] == "" || $_POST["password"] == "" || $_POST["firstName"] == "" || $_POST["lastName"] == ""){
		$message = "Please Complete the Form";
        echo $message;
	 }
	 else
	 {
		if(count($_POST)>0) {
            $sql = "SELECT * FROM login WHERE userName = '$userName'";
            $result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result)!=0) {
				$message = "Username Already Exists.";
                echo $message;
                
			}else{			
                $qry = mysqli_query($conn,"INSERT INTO login (userName, password, firstName, lastName) VALUES ('" .$userName."', '".md5($password)."' , '".$firstName."' , '".$lastName."') ") or die (mysqli_error($conn));
                echo "Successfully Registered!";
            }
		}else{
            echo "no data found";
        }
	
}
}
?>