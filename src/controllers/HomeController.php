<?php
class HomeController
{
    public static function index()
    {
        $stats = [
            'customer_count'   => Customer::getCount(),
            'order_count'      => Order::getCount(),
            'orders_by_status' => Order::getCountByStatus(),
        ];
        require __DIR__ . '/../views/home.php';
    }
}