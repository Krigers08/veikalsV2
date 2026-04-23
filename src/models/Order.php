<?php
class Order
{
    public int $order_id;
    public string $date;
    public string $status;
    public ?string $comment;
    public ?string $delivery_date;
    public int $customer_id;
    public ?string $name;
    public ?string $surname;

    public function __construct(array $row)
    {
        $this->order_id = $row['order_id'];
        $this->date = $row['date'];
        $this->status = $row['status'];
        $this->comment = $row['comment'] ?? null;
        $this->delivery_date = $row['delivery_date'] ?? null;
        $this->customer_id = $row['customer_id'];
        $this->name = $row['name'] ?? null;
        $this->surname = $row['surname'] ?? null;
    }

    public static function getAll(string $status = null): array
    {
        $sql = "
            SELECT
                o.order_id,
                o.date,
                o.status,
                o.comment,
                o.delivery_date,
                o.customer_id,
                c.name,
                c.surname
            FROM orders o
            LEFT JOIN customers c ON c.customer_id = o.customer_id
        ";

        if ($status !== null) {
            $sql .= " WHERE o.status = " . DB::$pdo->quote($status);
        }

        $sql .= " ORDER BY o.order_id";

        return array_map(
            fn($row) => new self($row),
            DB::query($sql)->fetchAll(PDO::FETCH_ASSOC)
        );
    }
    public static function getCount(): int
    {
        $stmt = DB::query("SELECT COUNT(*) FROM orders");
        return (int) $stmt->fetchColumn();
    }

    public static function getCountByStatus(): array
    {
        $stmt = DB::query("
            SELECT status, COUNT(*) AS count
            FROM orders
            GROUP BY status
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function create(string $date, string $status, string $comment, string $delivery_date, int $customer_id): void
    {
        $stmt = DB::$pdo->prepare("
            INSERT INTO orders (date, status, comment, delivery_date, customer_id)
            VALUES (:date, :status, :comment, :delivery_date, :customer_id)
        ");
        $stmt->execute([
            ':date' => $date,
            ':status' => $status,
            ':comment' => $comment,
            ':delivery_date' => $delivery_date,
            ':customer_id' => $customer_id,
        ]);
    }
}