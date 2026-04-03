<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    var_dump($_POST);
    $id = $_POST['user_id'];
    $choosen_book = $_POST['chosenBookID'];
    $name;
    $author;
    try{
        require_once "dbh.inc.php";
        $query = "SELECT author, book_name from book where id=$choosen_book;";
        $result = $pdo->query($query);
        while($row=$result->fetch()){
            $name = $row['book_name'];
            $author = $row['author'];
        }
        $query = "INSERT INTO taken_books (book_id, reader_id, book_name,author) VALUES (?,?,?,?);";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$choosen_book, $id, $name, $author]);
        $query = "UPDATE book SET taken=taken+1 where id = ?;";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$choosen_book]);
        $pdo=null;
        $stmt=null;
        header("Location: readers.php");
        exit();
    }catch(PDOException $e){
        die("Query failed: ". $e->getMessage());
    }
}

?>