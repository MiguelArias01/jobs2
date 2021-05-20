<?php
require_once "config.php";

$phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);


$conn->exec("UPDATE jobs SET phone='$phone' WHERE users_ID = {$_SESSION['job_id']}");

header("Location: profile.php");
die();


?>
