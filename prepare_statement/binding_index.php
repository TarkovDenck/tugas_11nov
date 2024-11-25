<?php

require 'getConnection.php';

$connection = getConnection();

$username = "admin";
$password = "admin";


$sql = "SELECT * FROM admin WHERE username = :username AND password = :password";
$stmt = $connection->prepare($sql);


$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);


$stmt->execute();


$result = $stmt->fetch(PDO::FETCH_NUM);


if ($result) {

    $success = true;


    echo "Welcome, " . $result[0];  
} else {

    $success = false;
    echo "GAGAL LOGIN" . PHP_EOL;
}


$connection = null;
?>
