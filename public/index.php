<?php

require __DIR__ . '/../db/connect.php';

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($requestUri === '/customers') {
    $stmt = $conn->query("SELECT * FROM customers");
    $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h1>Klientu saraksts</h1>";
    echo "<ul>";
    foreach ($customers as $customer) {
        echo "<li>" . htmlspecialchars($customer['name']) . " - " . htmlspecialchars($customer['email']) . "</li>";
    }
    echo "</ul>";
} else {
    $stmt = $conn->query("SELECT * FROM customers");
    $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h1>Klienti</h1>";
    foreach ($customers as $c) {
        echo htmlspecialchars($c['name']) . " - " . htmlspecialchars($c['email']) . "<br>";
    }
}
?>