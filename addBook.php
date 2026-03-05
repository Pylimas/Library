<?php
if($_SERVER["REQUEST_METHOD"] =="POST"){
    $name=$_POST["name"];
    $author=$_POST["author"];
    $isbn=$_POST["isbn"];
    $quantity=$_POST["quantity"];
    $genre=$_POST["genre"];
    try {
        require_once "dbh.inc.php";
        $query = "INSERT INTO book (name, author,isbn,quantity,free,genre) VALUES (?,?,?,?,?,?);";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$name, $author, $isbn, $quantity, 0, $genre]);
        $pdo=null;
        $stmt=null;
        exit();
        header("Location: ../books.php");
    }catch(PDOException $e){
        die("Query failed: ". $e->getMessage());
    }

}else{
    header("Location: ../books.php");
}

?>