<?php
require_once "config.php";

$id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);

$result = $conn->query("SELECT * FROM jobs where users_ID=$id");
$row = $result->fetch(PDO::FETCH_ASSOC);


$conn->exec("DELETE FROM jobs WHERE users_id=$id AND users_ID={$_SESSION['job_id']}");


header("Location: profile.php");
die();