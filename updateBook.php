<?php
if($_SERVER["REQUEST_METHOD"] =="POST"){
    $name=$_POST["name"];
    $author=$_POST["author"];
    $isbn=$_POST["isbn"];
    $quantity=$_POST["quantity"];
    $id = $_POST["id"];
    try {
        require_once "dbh.inc.php";
        $query = "UPDATE book SET book_name = :book_name, author = :author, isbn = :isbn, quantity = :quantity WHERE id = $id;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":book_name", $name);
        $stmt->bindParam(":author", $author);
        $stmt->bindParam(":isbn", $isbn);
        $stmt->bindParam(":quantity", $quantity);
        $stmt->execute();
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