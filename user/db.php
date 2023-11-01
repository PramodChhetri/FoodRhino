<?php

$db_host = "localhost";
$db_name = "foodrhino";
$db_user = "root";
$db_password = "";
$dsn = "mysql:host=" . $db_host . ";dbname=" . $db_name;

$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $pdo = new PDO($dsn, $db_user, $db_password, $options);
} catch (PDOException $e) {
    die("Cannot connect to database!");
}
