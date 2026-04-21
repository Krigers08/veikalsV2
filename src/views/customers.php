<?php
echo "<h1>Klientu saraksts</h1>";
echo "<ul>";
foreach ($customers as $customer) {
    echo "<li>" . htmlspecialchars($customer['name']) . " - " . htmlspecialchars($customer['email']) . "</li>";
}
echo "</ul>";