<?php
error_reporting(E_ALL);
include '../connect.php';
global $pdo;
$ex_code = $_POST['external_code'];
$number = $_POST['number'];
$status = $_POST['status'];
$name = $_POST['name'];

$sql = "INSERT INTO tenders (external_code, number, status, name) VALUES ('$ex_code', '$number', '$status', '$name')";
$query = $pdo->prepare($sql);
$query->execute();

header('Location: ' . 'https://' . $_SERVER['HTTP_HOST'] . '/create.php');
