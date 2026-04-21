<?php

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

function getConnection() {
    global $config, $dsn;

    try {
        $conn = new PDO($dsn, $config['username'], $config['password']);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

$conn = getConnection();