<?php
require 'getConnection.php'; 

$connection = getConnection();


$username = "admin";
$password = "admin";


$stmt = $connection->prepare("SELECT * FROM admin WHERE username = :username AND password = :password");

// Bind parameters to the prepared statement
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->bindParam(':password', $password, PDO::PARAM_STR);

// Execute the query
$stmt->execute();


if ($stmt->rowCount() > 0) {
    echo "SUKSES LOGIN" . PHP_EOL;
} else {
    echo "GAGAL LOGIN" . PHP_EOL;
}

$connection = null;
?>
