<?php
class CustomerController
{
    public static function index()
    {
        $customers = Customer::getAllWithOrders();
        require __DIR__ . '/../views/customers.php';
    }
}