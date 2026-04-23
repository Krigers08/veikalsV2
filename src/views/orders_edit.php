<?php require __DIR__ . '/layout/nav.php'; ?>
<h1>Labot pasūtījumu #<?= $order->order_id ?></h1>
<form method="POST" action="/orders/<?= $order->order_id ?>/update">
    <label>Datums:
        <input type="date" name="date" value="<?= $order->date ?>" required>
    </label><br>
    <label>Statuss:
        <select name="status" required>
            <?php foreach (Order::STATUSES as $status): ?>
                <option value="<?= $status ?>" <?= $status === $order->status ? 'selected' : '' ?>>
                    <?= $status ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label><br>
    <label>Komentārs:
        <input type="text" name="comment" value="<?= htmlspecialchars($order->comment ?? '') ?>">
    </label><br>
    <label>Piegādes datums:
        <input type="date" name="delivery_date" value="<?= $order->delivery_date ?? '' ?>">
    </label><br>
    <button type="submit">Saglabāt</button>
</form>