<?php
require 'getConnection.php';

$connection = getConnection();


$connection->exec("INSERT INTO comments (email, comment) VALUES('eko@test.com', 'hi')");
$id = $connection->lastInsertId();

var_dump($id);

$connection = null;
?>