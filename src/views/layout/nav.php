<?php $current = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); ?>
<style>
    nav { margin-bottom: 20px; }
    nav a { margin-right: 15px; text-decoration: none; color: #333; }
    nav a.active { font-weight: bold; color: #000; }
</style>
<nav>
    <a href="/" <?= $current === '/' ? 'class="active"' : '' ?>>Home</a>
    <a href="/customers" <?= $current === '/customers' ? 'class="active"' : '' ?>>Customers</a>
    <a href="/orders" <?= $current === '/orders' ? 'class="active"' : '' ?>>Orders</a>
</nav>