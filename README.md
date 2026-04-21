PHP customer and order viewer.

`config.php` — database connection settings
`db/DB.php` — connects to the database using PDO, runs queries
`public/index.php` — entry point, routes `/customers` to the controller
`src/controllers/CustomerController.php` — fetches customers and their orders, groups them
`src/views/customers.php` — displays the customer list with orders nested below each one

to launch
php -S localhost:8000 -t public

to view
Then open `http://localhost:8000/customers`