<?php require __DIR__ . '/layout/nav.php'; ?>
<h1>Jauns pasūtījums</h1>
<form method="POST" action="/orders/store">
    <label>Datums:
        <input type="date" name="date" required>
    </label><br>
    <label>Statuss:
        <input type="text" name="status" required>
    </label><br>
    <label>Komentārs:
        <input type="text" name="comment">
    </label><br>
    <label>Piegādes datums:
        <input type="date" name="delivery_date">
    </label><br>
    <label>Klients:
        <select name="customer_id" required>
            <?php foreach ($customers as $customer): ?>
                <option value="<?= $customer->customer_id ?>">
                    <?= htmlspecialchars($customer->name . ' ' . $customer->surname) ?>
                </option>
            <?php endforeach; ?>
        </select>
        </select>
    </label><br>
    <button type="submit">Izveidot</button>
</form>