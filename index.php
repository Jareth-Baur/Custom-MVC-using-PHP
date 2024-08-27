<?php
require 'config.php';
require 'core/init.php';

$router = new Router();

require 'routes.php';

$url = isset($_GET['url']) ? $_GET['url'] : '/';
$method = $_SERVER['REQUEST_METHOD'];
$router->route($url, $method);