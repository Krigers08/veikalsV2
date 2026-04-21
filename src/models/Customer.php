<?php
class Customer
{
    public static function getAllWithOrders(): array
    {
        $stmt = DB::query("
            SELECT
                c.customer_id,
                c.name,
                c.surname,
                c.email,
                o.order_id,
                o.date,
                o.status
            FROM customers c
            LEFT JOIN orders o ON o.customer_id = c.customer_id
            ORDER BY c.customer_id
        ");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $customers = [];
        foreach ($rows as $row) {
            $cid = $row['customer_id'];
            if (!isset($customers[$cid])) {
                $customers[$cid] = [
                    'name'   => $row['name'] . ' ' . $row['surname'],
                    'email'  => $row['email'],
                    'orders' => [],
                ];
            }
            if ($row['order_id'] !== null) {
                $customers[$cid]['orders'][] = [
                    'id'     => $row['order_id'],
                    'date'   => $row['date'],
                    'status' => $row['status'],
                ];
            }
        }

        return $customers;
    }
}