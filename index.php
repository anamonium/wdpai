<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('welcomePage', 'DefaultController');
Router::post('guestList', 'GuestListController');
Router::post('checklist', 'CheckListController');
Router::post('budget', 'BudgetController');
Router::post('vendor', 'VendorController');

Router::post('login', 'SecurityController');
Router::post('sign', 'SecurityController');
Router::post('welcomePage', 'DefaultController');

Router::run($path);

?>