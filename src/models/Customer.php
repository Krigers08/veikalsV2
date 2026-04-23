<?php
class Customer
{
    public int $customer_id;
    public string $name;
    public string $surname;
    public string $email;
    public array $orders;

    public function __construct(array $row)
    {
        $this->customer_id = $row['customer_id'];
        $this->name        = $row['name'];
        $this->surname     = $row['surname'];
        $this->email       = $row['email'];
        $this->orders      = [];
    }

    public static function getAll(): array
    {
        $stmt = DB::query("SELECT customer_id, name, surname FROM customers ORDER BY surname");
        return array_map(
            fn($row) => new self($row),
            $stmt->fetchAll(PDO::FETCH_ASSOC)
        );
    }

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
                $customers[$cid] = new self($row);
            }
            if ($row['order_id'] !== null) {
                $customers[$cid]->orders[] = new Order($row);
            }
        }

        return $customers;
    }

    public static function getCount(): int
    {
        $stmt = DB::query("SELECT COUNT(*) FROM customers");
        return (int) $stmt->fetchColumn();
    }
}