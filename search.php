<?php


require_once "db.php";

if (empty($_GET['s'])) {
    header("Location: index.php");
    die;
}

$s = $_GET['s'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE name LIKE ?");
$stmt->execute(['%' . $s . '%']);
$data = $stmt->fetchAll();

print_r($data);
