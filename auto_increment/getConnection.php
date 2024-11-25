<?php 

function getConnection(): PDO
{
    $host = "localhost";
    $port = 3306;
    $database = "tugas";
    $username = "root";
    $password = "";

    try {
        return new PDO("mysql:host=$host;port=$port;dbname=$database;charset=utf8", $username, $password);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}



?>