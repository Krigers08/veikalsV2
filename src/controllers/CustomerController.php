<?php
class CustomerController
{
    public static function index()
    {
        $stmt = DB::query("SELECT * FROM customers");
        $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require __DIR__ . '/../views/customers.php';
    }
}