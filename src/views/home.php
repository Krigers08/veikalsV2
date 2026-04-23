<?php require __DIR__ . '/layout/nav.php'; ?>
<?php
echo "<h1>Statistika</h1>";
echo "<p>Klienti: " . $stats['customer_count'] . "</p>";
echo "<p>Pasūtījumi: " . $stats['order_count'] . "</p>";
echo "<h2>Pasūtījumi pēc statusa</h2>";
echo "<ul>";
foreach ($stats['orders_by_status'] as $row) {
    echo "<li>" . htmlspecialchars($row['status']) . ": " . $row['count'] . "</li>";
}
echo "</ul>";