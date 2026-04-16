<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['id'];
    $name = $_POST["name_update"];
    $surname=$_POST["surname_update"];
    try{
        require_once "dbh.inc.php";
        $query = "UPDATE employee SET employee_name = :employee_name, surname = :surname WHERE id = :id;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":employee_name", $name);
        $stmt->bindParam(":surname", $surname);
        $stmt->bindParam(":id", $id);
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