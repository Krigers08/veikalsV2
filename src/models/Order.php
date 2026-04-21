<?php
class Order
{
    public static function getAll(): array
    {
        $stmt = DB::query("
            SELECT
                o.order_id,
                o.date,
                o.status,
                o.comment,
                o.delivery_date,
                c.name,
                c.surname
            FROM orders o
            LEFT JOIN customers c ON c.customer_id = o.customer_id
            ORDER BY o.order_id
        ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}