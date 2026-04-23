<?php require __DIR__ . '/layout/nav.php'; ?>
<?php
echo "<h1>Klientu saraksts</h1>";
echo "<ul>";
foreach ($customers as $customer) {
    echo "<li>";
    echo htmlspecialchars($customer['name']) . " — " . htmlspecialchars($customer['email']);

    if (!empty($customer['orders'])) {
        echo "<ul>";
        foreach ($customer['orders'] as $order) {
            echo "<li>Pasūtījums #" . htmlspecialchars($order['id']) .
                " — " . htmlspecialchars($order['date']) .
                " — " . htmlspecialchars($order['status']) . "</li>";
        }
        echo "</ul>";
    }
}
echo "</ul>";
