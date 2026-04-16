<?php
require 'dbh.inc.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM employee WHERE id = ?");
$stmt->execute([$id]);
$employee = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($employee);