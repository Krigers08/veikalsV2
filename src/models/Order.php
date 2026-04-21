<?php
class Order
{
    public static function getAll(string $status = null): array
    {
        $sql = "
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
        ";

        if ($status !== null) {
            $sql .= " WHERE o.status = " . DB::$pdo->quote($status);
        }

        $sql .= " ORDER BY o.order_id";

        return DB::query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}