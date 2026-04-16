<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST["name"];
    $surname=$_POST["surname"];
    $username=$_POST["username"];
    $pass=$_POST["pass"];
    try{
        require_once "dbh.inc.php";
        $query = "INSERT INTO employee (employee_name, surname, username, pass) VALUES (?,?,?,?);";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$name, $surname, $username, $pass]);
        $pdo=null;
        $stmt = null;
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