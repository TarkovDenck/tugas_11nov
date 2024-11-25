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


$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    // Login success, set success to true
    $success = true;
    
    // Access a column's value from the result
    echo "Welcome, " . $result['username'];  // You can replace 'username' with the actual column name in the table
} else {
    // No result found, login failed
    $success = false;
    echo "GAGAL LOGIN" . PHP_EOL;
}

// Close the connection
$connection = null;
?>
