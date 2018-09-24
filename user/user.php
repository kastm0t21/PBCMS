<?php
require_once("../conn/config.php");
require_once("database.php");

class User {
    
    public $id;
    public $userName;
    public $password;
    public $firstName;
    public $lastName;
    
//    function login() {
//        if(isset($_POST['userName']) and isset($_POST['password']))
//        {
//        //Check if valid username and password
//            $q = "SELECT * FROM login WHERE userName = '$userName' AND password = '$password'";
//            $res = mysqli_query($conn,$q) or die(mysqli_error());
//            $count = mysqli_num_rows($res);
//            $row = mysqli_fetch_array($res);
//            if($count == 1)
//            {
//                $cookie_val = $row['userId'];
//                $cookie_name = "user";
//                setcookie($cookie_name, $cookie_val, time() + (1800), "/"); //1800 = 30 minutes
//            echo "login";
//            }
//            else
//                    {
//                     echo "Invalid Username or Password!";
//                     }
//        }
//    }
        public function login($userName="", $password="") {
            global $database;
            $userName = $database->escape_value($userName);
            $password = $database->escape_value($password);
            
            $sql = "SELECT * FROM login";
            $sql .= "WHERE userName = '{$userName}' ";
            $sql .= "AND password = '{$password}' ";
            $sql .= "LIMIT 1";
            $result_array = self::find_by_sql($sql);
            return !empty($result_array) ? array_shift($result_array) : false;
        }
    

    function register() {
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
    }

    function username() {
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
    }

    function password() {
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
    }

    function name() {
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
    }
}