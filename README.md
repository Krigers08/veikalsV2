# veikalsV3

A PHP MVC web app for managing customers and orders.

## What it does

- **Home** `/` — shows customer and order stats
- **Customers** `/customers` — lists all customers with their orders nested below them
- **Orders** `/orders` — lists all orders, filterable by `?status=`
- **Orders CRUD** — create, edit and delete orders

## How it works

```
Request → Router → Controller → Model → View
```

Every request goes through `public/index.php` which registers all routes and calls `Router::dispatch()`. The Router loops through all registered routes, uses `preg_match` to compare the current URL against each pattern, extracts any IDs from the URL, and calls the matching controller method. The controller asks the model for data, then loads a view.

## Key implementation details

**Routing** — URLs are matched using regex patterns. Dynamic segments like order IDs are captured with `(\d+)` and passed directly to the controller as arguments.
```php
Router::get('#^/orders/(\d+)/edit$#', [OrderController::class, 'edit']);
```

**Models as instances** — every row returned from the database is mapped into a class instance via `__construct`, so controllers and views work with objects instead of raw arrays.
```php
fn($row) => new self($row)
```

**JOIN query with grouping** — customers and their orders are fetched in a single `LEFT JOIN` query. The flat rows are then grouped in PHP into a hierarchy of `Customer` objects each holding an array of `Order` objects.

**Prepared statements** — all queries that take user input use `DB::$pdo->prepare()` with named parameters to prevent SQL injection.

```php
$stmt = DB::$pdo->prepare("UPDATE orders SET status = :status WHERE order_id = :id");
```

**Shared navigation** — `nav.php` is included at the top of every view using `require`. It reads the current URL and applies `class="active"` to the matching nav link.

## Setup

```bash
# Start the server
php -S localhost:8000 -t public
```

Then open `http://localhost:8000`