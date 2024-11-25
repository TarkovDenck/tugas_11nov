<?php
// Koneksi ke database
require 'getConnection.php';

$connection = getConnection();

$username = "admin";
$password = "admin";


$sql = "SELECT * FROM admin WHERE username = ?";
$stmt = $connection->prepare($sql);

try {
    $stmt->execute([$username]);


    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifikasi password
        if (password_verify($password, $row['password'])) {
            echo "Login berhasil!";
        } else {
            echo "Password salah.";
        }
    } else {
        echo "Username tidak ditemukan.";
    }
} catch (PDOException $e) {
    echo "Kesalahan query: " . $e->getMessage();
}
?>
