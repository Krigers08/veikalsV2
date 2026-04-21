<?php
class OrderController
{
    public static function index()
    {
        $status = $_GET['status'] ?? null;
        $orders = Order::getAll($status);
        require __DIR__ . '/../views/orders.php';
    }
}