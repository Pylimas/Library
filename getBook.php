<?php
require 'dbh.inc.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM book WHERE id = ?");
$stmt->execute([$id]);
$book = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($book);