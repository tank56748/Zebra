<?php
$driver = 'mysql';
$host = '127.0.0.1';
$db_name = 'tenders';
$db_user = 'tenders_user';
$db_pass = 'qwerty654321';
$charset = 'utf8';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,	// Режим сообщения об ошибках PDO. Выбрасывает PDOException.
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
try {
$pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=$charset", $db_user, $db_pass, $options);
}catch(PDOException $i){
	die("Ошибка подключения к базе данных");
}
