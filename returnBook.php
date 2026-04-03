<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['id'];
    $book_id = $_POST['book_id'];
    try{
        require_once "dbh.inc.php";
        $query = "DELETE FROM taken_books where id = $id;";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $query = "UPDATE book SET taken= taken-1 where id = $book_id;";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $pdo=null;
        $stmt=null;
        header("Location: readers.php");
        exit();
    }catch(PDOException $e){
        die("Query failed: ". $e->getMessage());
    }
}

?>