<?php 

// Fungsi untuk mendapatkan koneksi database
function getConnection(): PDO
{
    $host = "localhost";
    $port = 3306;
    $database = "tugas";
    $username = "root";
    $password = "";

    try {
        return new PDO(
            "mysql:host=$host;port=$port;dbname=$database;charset=utf8", 
            $username, 
            $password,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

// Contoh data login (simulasi input)
$username = "admin"; // Ganti dengan input dari pengguna (e.g., $_POST['username'])
$password = "admin"; // Ganti dengan input dari pengguna (e.g., $_POST['password'])

// Membuat koneksi ke database
$connection = getConnection();

try {
    // Query dengan prepared statement
    $sql = "SELECT * FROM admin WHERE username = :username AND password = :password";

    // Mempersiapkan query
    $statement = $connection->prepare($sql);

    // Mengikat parameter
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->bindParam(':password', $password, PDO::PARAM_STR);

    // Menjalankan query
    $statement->execute();

    // Mengecek apakah data ditemukan
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
