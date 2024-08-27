<?php
// Define your custom routes
$router->addRoute('GET', '/', 'HomeController', 'index');

/*
$router->addRoute('GET', 'user', 'UserController', 'index');
$router->addRoute('GET', 'user/:id', 'UserController', 'userbyID');
$router->addRoute('GET', 'userlist', 'UserController', 'list_of_users');
*/

//Product Routing
$router->addRoute('GET', 'shop', 'ProductController', 'listProducts');
$router->addRoute('GET', 'product/:id', 'ProductController', 'productById');
$router->addRoute('GET', 'productline/:productLine', 'ProductController', 'productsByProductline');

//ORDERS
$router->addRoute('GET', 'orders', 'OrderController', 'list');
// Get orders by a specific customer (Assuming the customer ID is passed in the URL)
$router->addRoute('GET', 'order/:customerId', 'OrderController', 'ordersByCustomer');
// Get products in a specific order (Assuming the product ID is passed in the URL)
$router->addRoute('GET', 'order/product/:productCode', 'OrderController', 'orderProducts');


// CUSTOMERS
$router->addRoute('GET', 'customers', 'CustomerController', 'listCustomer');
$router->addRoute('GET', 'customer/:id', 'CustomerController', 'customerById');

//API
$router->addRoute('GET', 'api/products', 'APIController', 'getProducts');
$router->addRoute('GET', 'api/product/:id', 'APIController', 'getProductByID');
$router->addRoute('GET', 'api/category/:cat', 'APIController', 'getProductbyCat');
