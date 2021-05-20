<?php
require_once "config.php";
if(isset($_POST['submit'])){
    $company = filter_var($_POST['company'], filter: FILTER_SANITIZE_STRING);
    $city = filter_var($_POST['city'], filter: FILTER_SANITIZE_STRING);
    $username = filter_var($_POST['username'], filter: FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], filter: FILTER_SANITIZE_STRING);
    $repeat = filter_var($_POST['repeat'], filter: FILTER_SANITIZE_STRING);}

    if(empty($username) || empty($password) || empty($repeat)) {


        $error = " all values are mandatory";
    }
else if ($password != $repeat){
        $error = "passwords do not match";
}
else   {
    $result= $conn->query ( "SELECT * FROM users WHERE username='$username'");
    if($result->rowCount() > 0){
        $error = " Username already taken";
        header("location: login.php");
        die();
    }
    else {
        $encrypted = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO users (Username, Password, Company, City) VALUES('$username', '$encrypted', '$company', '$city')";
        $conn -> exec($query);
        header("location: login.php");
        die();
    }
        }
 header("location: register.php");
die();
?>