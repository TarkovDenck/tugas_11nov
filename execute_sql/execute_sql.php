<?php
require 'getConnection.php';

$connection = getConnection();

$sql = <<<SQL
INSERT INTO customers (name, email) 
VALUES ('Eko', 'eko@test.com');
SQL;

try {
    $connection->exec($sql);
    echo "Record inserted successfully.";
} catch (PDOException $e) {
    echo "Error inserting record: " . $e->getMessage();
}

$connection = null;

?>
