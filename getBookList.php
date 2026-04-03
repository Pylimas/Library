<?php
include_once "dbh.inc.php";

$id = intval($_GET['id']);
$query = "SELECT id, book_name, author 
            FROM book WHERE id NOT IN (SELECT book_id from taken_books where reader_id = ?)";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);

?>