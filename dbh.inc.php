<?php
$dbUsename="root";
$dbPassword="";
$dbPort=3307;
$dns = "mysql:host=localhost;port=3307;dbname=library2";

try{
    $pdo = new PDO($dns, $dbUsename,$dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Connection failed: ". $e->getMessage();
}


?>