<?php
class CustomerController
{
    public static function index()
    {
        $stmt = DB::query("SELECT * FROM customers");
        $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<h1>Klientu saraksts</h1>";
        echo "<ul>";
        foreach ($customers as $customer) {
            echo "<li>" . htmlspecialchars($customer['name']) . " - " . htmlspecialchars($customer['email']) . "</li>";
        }
        echo "</ul>";
    }
}