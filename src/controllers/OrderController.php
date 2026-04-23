<?php
class OrderController
{
    public static function index()
    {
        $status = $_GET['status'] ?? null;
        $orders = Order::getAll($status);
        require __DIR__ . '/../views/orders.php';
    }

    public static function create()
    {
        $customers = Customer::getAll();
        require __DIR__ . '/../views/orders_create.php';
    }

    public static function store()
    {
        Order::create(
            $_POST['date'],
            $_POST['status'],
            $_POST['comment'],
            $_POST['delivery_date'],
            (int) $_POST['customer_id']
        );
        header('Location: /orders');
        exit;
    }
    public static function edit(int $id)
    {
        $order     = Order::getById($id);
        require __DIR__ . '/../views/orders_edit.php';
    }

    public static function update(int $id)
    {
        Order::update(
            $id,
            $_POST['date'],
            $_POST['status'],
            $_POST['comment'],
            $_POST['delivery_date'],
            $order->customer_id
        );
        header('Location: /orders');
        exit;
    }

    public static function delete(int $id)
    {
        Order::delete($id);
        header('Location: /orders');
        exit;
    }
}