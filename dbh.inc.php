<?php
$dbUsename="root";
$dbPassword="mysql";
$dns = "mysql:host=localhost;dbname=library";

try{
    $pdo = new PDO($dns, $dbUsename,$dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Connection failed: ". $e->getMessage();
}


?>