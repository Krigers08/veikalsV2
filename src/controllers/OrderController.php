<?php
class OrderController
{
    public static function index()
    {
        $orders = Order::getAll();
        require __DIR__ . '/../views/orders.php';
    }
}