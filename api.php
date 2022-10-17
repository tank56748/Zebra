<?php
include 'connect.php';
global $pdo;

if(!isset($_GET['id'])){
	$sql = "SELECT * FROM tenders";
	$query = $pdo->prepare($sql);
	$query->execute();
	$res = $query->fetchAll();
	echo json_encode($res, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_FORCE_OBJECT | JSON_HEX_QUOT);
}else{
	$id = $_GET['id'];
	$sql = "SELECT * FROM tenders WHERE id = '$id'";
	$query = $pdo->prepare($sql);
	$query->execute();
	$res = $query->fetch();
	echo json_encode($res, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_FORCE_OBJECT | JSON_HEX_QUOT);
}