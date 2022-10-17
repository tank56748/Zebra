<?php
include 'connect.php';

global $pdo;

if(!isset($_GET['date']) and !isset($_GET['name'])){
	$sql = "SELECT * FROM tenders";
	$query = $pdo->prepare($sql);
	$query->execute();
	$tenders = $query->fetchAll();
}elseif(isset($_GET['date'])){
	if($_GET['date'] == 'asc'){
		$sql = "SELECT * FROM tenders ORDER BY date ASC";
	}elseif($_GET['date'] == 'desc'){
		$sql = "SELECT * FROM tenders ORDER BY date DESC";
	}
	$query = $pdo->prepare($sql);
	$query->execute();
	$tenders = $query->fetchAll();
}elseif(isset($_GET['name'])){
	if($_GET['name'] == 'asc'){
		$sql = "SELECT * FROM tenders ORDER BY name ASC";
	}elseif($_GET['name'] == 'desc'){
		$sql = "SELECT * FROM tenders ORDER BY name DESC";
	}
	$query = $pdo->prepare($sql);
	$query->execute();
	$tenders = $query->fetchAll();
}




?>
<button onclick="location.href='create.php'">Создать тендер</button>
<button onclick="location.href='api.php'">Тендеры JSON</button>
<button onclick="location.href='<?if(!isset($_GET['name']) || $_GET['name'] == 'desc'){echo '/?name=asc';}else{echo '/?name=desc';}?>'">Отфильтровать по названию</button>
<button onclick="location.href='<?if(!isset($_GET['date']) || $_GET['date'] == 'desc'){echo '/?date=asc';}else{echo '/?date=desc';}?>'">Отфильтровать по дате</button>
<table>
	<tr>
		<td>ID</td>
		<td>Внешний код</td>
		<td>Номер</td>
		<td>Статус</td>
		<td>Название</td>
		<td>Дата изменения</td>
		<td>Получить тендер</td>
	</tr>
	<? foreach($tenders as $key => $tender): ?>
		<tr>
			<td><?=$key+1?></td>
			<td><?=$tender['external_code']?></td>
			<td><?=$tender['number']?></td>
			<td><?=$tender['status']?></td>
			<td><?=$tender['name']?></td>
			<td><?=$tender['date']?></td>
			<td><a href="api.php/?id=<?=$tender['id']?>">Тендер в JSON</a></td>
		</tr>
	<? endforeach; ?>
	<tr>
		<td>ID</td>
		<td>Внешний код</td>
		<td>Номер</td>
		<td>Статус</td>
		<td>Название</td>
		<td>Дата изменения</td>
		<td>Получить тендер</td>
	</tr>
</table>
