<?php
require 'getConnection.php';

$connection = getConnection(); 

$sql = "SELECT * FROM customers";
$result = $connection->query($sql);

if ($result) {
    foreach ($result as $row) {
        echo "ID: " . $row['id'] . "<br>";
        echo "Name: " . $row['NAME'] . "<br>";
        echo "Email: " . $row['email'] . "<br>";
        echo "---------------------------<br>";
    }
} else {
    echo "No records found.";
}

$connection = null;
?>
