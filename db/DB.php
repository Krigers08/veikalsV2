<?php
class DB
{
    public static $pdo;

    public static function connect()
    {
        $config = [
            'host' => '172.18.80.1',
            'database' => 'store_dev',
            'charset' => 'utf8mb4',
            'username' => 'store_app',
            'password' => 'password',
        ];

        $dsn = sprintf(
            "mysql:host=%s;dbname=%s;charset=%s",
            $config['host'],
            $config['database'],
            $config['charset']
        );

        self::$pdo = new PDO($dsn, $config['username'], $config['password']);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function query($sqlQuery)
    {
        return self::$pdo->query($sqlQuery);
    }
}