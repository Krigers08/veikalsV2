<?php require __DIR__ . '/layout/nav.php'; ?>
<h1>Pasūtījumu saraksts</h1>
<ul>
    <?php foreach ($orders as $order): ?>
        <li>
            Pasūtījums #<?= $order->order_id ?> — <?= htmlspecialchars($order->name . ' ' . $order->surname) ?> — <?= htmlspecialchars($order->date) ?> — <?= htmlspecialchars($order->status) ?>
            <a href="/orders/<?= $order->order_id ?>/edit">Labot</a>
            <a href="/orders/<?= $order->order_id ?>/delete">Dzēst</a>
        </li>
    <?php endforeach; ?>
</ul>
<a href="/orders/create">+ Jauns pasūtījums</a>