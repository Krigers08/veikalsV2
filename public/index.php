<?php
require __DIR__ . '/../db/DB.php';
require __DIR__ . '/../src/Router.php';
require __DIR__ . '/../src/models/Customer.php';
require __DIR__ . '/../src/models/Order.php';
require __DIR__ . '/../src/controllers/HomeController.php';
require __DIR__ . '/../src/controllers/CustomerController.php';
require __DIR__ . '/../src/controllers/OrderController.php';

DB::connect();

Router::get('#^/$#', [HomeController::class, 'index']);

Router::get('#^/customers$#',[CustomerController::class, 'index']);

Router::get('#^/orders$#',[OrderController::class, 'index']);
Router::get('#^/orders/create$#',[OrderController::class, 'create']);
Router::post('#^/orders/store$#',[OrderController::class, 'store']);
Router::get('#^/orders/(\d+)/edit$#',[OrderController::class, 'edit']);
Router::post('#^/orders/(\d+)/update$#',[OrderController::class, 'update']);
Router::get('#^/orders/(\d+)/delete$#',[OrderController::class, 'delete']);

Router::dispatch(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));