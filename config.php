<?php
session_start();
$conn = new PDO( dsn:"mysql:host=localhost;dbname=authentication", username: "test", password: "test");
