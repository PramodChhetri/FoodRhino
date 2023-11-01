<?php


require_once "db.php";

if (empty($_POST['search'])) {
    header("Location: index.php");
    die;
}

$s = $_POST['search'];
$stmt = $pdo->prepare("SELECT * FROM restaurant WHERE Name LIKE ?");
$stmt->execute(['%' . $s . '%']);
$data = $stmt->fetchAll();

print_r($data);
