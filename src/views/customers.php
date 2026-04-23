<?php require __DIR__ . '/layout/nav.php'; ?>
<h1>Klientu saraksts</h1>
<ul>
    <?php foreach ($customers as $customer): ?>
        <li>
            <?= htmlspecialchars($customer->name . ' ' . $customer->surname) ?> — <?= htmlspecialchars($customer->email) ?>
            <?php if (!empty($customer->orders)): ?>
                <ul>
                    <?php foreach ($customer->orders as $order): ?>
                        <li>Pasūtījums #<?= $order->order_id ?> — <?= htmlspecialchars($order->date) ?> — <?= htmlspecialchars($order->status) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>