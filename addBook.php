<?php
if($_SERVER["REQUEST_METHOD"] =="POST"){
    $name=$_POST["name"];
    $author=$_POST["author"];
    $isbn=$_POST["isbn"];
    $quantity=$_POST["quantity"];
    try {
        require_once "dbh.inc.php";
        $query = "INSERT INTO book (book_name, author,isbn,quantity,free) VALUES (?,?,?,?,?);";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$name, $author, $isbn, $quantity,$quantity]);
        $pdo=null;
        $stmt=null;
        header("Location: books.php");
        exit();
    }catch(PDOException $e){
        die("Query failed: ". $e->getMessage());
    }

}else{
    header("Location: books.php");
    exit();
}

?>