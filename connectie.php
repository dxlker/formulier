<?php

$host = 'localhost:3306';
$db   = 'winkel';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
 
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try
{
     $pdo = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
}
catch (\PDOException $e)
{
     echo "Error: " . $e->getMessage();
}
  
?>
 