<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $id=$_POST["id"];
    try{
        require_once "dbh.inc.php";
        $query = "DELETE FROM employee WHERE id = $id;";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $pdo=null;
        $stmt=null;
        header("Location: employee.php");
        exit();
    }catch(PDOException $e){
        die("Query failed: ". $e->getMessage());
    }
}else{
    header("Location: employee.php");
    exit();
}

?>