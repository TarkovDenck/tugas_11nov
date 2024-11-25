<?php

$host = "localhost";
$port = 3306;
$database = "belajar_php_database";
$username = "root";
$password = "";

try {
    $connection = new PDO("mysql:host=$host;port=$port;dbname=$database;charset=utf8", $username, $password);
    echo "Sukses terkoneksi ke database" . PHP_EOL;
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}

?>
