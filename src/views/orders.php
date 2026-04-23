<?php
require __DIR__ . '/layout/nav.php';
echo "<h1>Pasūtījumu saraksts</h1>";
echo "<ul>";
foreach ($orders as $order) {
    echo "<li>";
    echo "Pasūtījums #" . htmlspecialchars($order['order_id']);
    echo " — " . htmlspecialchars($order['name']) . " " . htmlspecialchars($order['surname']);
    echo " — " . htmlspecialchars($order['date']);
    echo " — " . htmlspecialchars($order['status']);
    echo "</li>";
}
echo "</ul>";?>
<a href="/orders/create">+ Jauns pasūtījums</a>