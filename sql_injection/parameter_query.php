<?php
require 'getConnection.php'; 

try {

    $connection = getConnection();


    $sql = "SELECT * FROM admin WHERE username = :username AND password = :password";


    $statement = $connection->prepare($sql);

  
    $username = "admin"; 
    $password = "admin"; 


    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->bindParam(':password', $password, PDO::PARAM_STR);


    $statement->execute();


    if ($statement->rowCount() > 0) {
        echo "SUKSES LOGIN" . PHP_EOL;
    } else {
        echo "GAGAL LOGIN" . PHP_EOL;
    }
} catch (PDOException $e) {
    // Menangani error
    echo "Error: " . $e->getMessage() . PHP_EOL;
} finally {
    // Menutup koneksi
    $connection = null;
}
?>
