<?php
REQuire_once "config.php";
unset($_SESSION['username']);
header("location: index.php");
die();

