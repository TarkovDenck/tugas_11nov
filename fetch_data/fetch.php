<?php

require 'getConnection.php';

$connection = getConnection();


$username = "admin";
$password = "admin"; 


$sql = "SELECT * FROM admin WHERE username = ?";
$stmt = $connection->prepare($sql);

try {
    $stmt->execute([$username]);

    // Periksa apakah username ditemukan
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Verifikasi password (gunakan hashing di database)
        if (password_verify($password, $row['password'])) {
            echo "SUKSES LOGIN: " . $row["username"] . PHP_EOL;
        } else {
            echo "Password salah." . PHP_EOL;
        }
    } else {
        echo "Username tidak ditemukan." . PHP_EOL;
    }
} catch (PDOException $e) {
    echo "Kesalahan query: " . $e->getMessage();
}
?>
