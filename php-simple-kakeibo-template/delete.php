<?php

include_once('./dbconnect.php');

$id = $_GET['id'];

$sql = "DELETE FROM records_2 WHERE id = :id";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

$stmt->execute();

header('Location: ./index.php');
exit();