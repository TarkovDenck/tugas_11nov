<?php


require 'getConnection.php';

$connection = getConnection();

$sql = "SELECT * FROM customers";

try {
    $result = $connection->query($sql);


    $customers = $result->fetchAll(PDO::FETCH_ASSOC);


    if (!empty($customers)) {
        echo "<h3>Data Customers</h3>";
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr>";
        foreach (array_keys($customers[0]) as $column) {
            echo "<th>" . htmlspecialchars($column) . "</th>";
        }
        echo "</tr>";
        foreach ($customers as $customer) {
            echo "<tr>";
            foreach ($customer as $value) {
                echo "<td>" . htmlspecialchars($value) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada data ditemukan di tabel customers.";
    }
} catch (PDOException $e) {
    echo "Kesalahan saat menjalankan query: " . $e->getMessage();
}
?>
