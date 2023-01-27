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
Router::post('vendorAdmin', 'VendorController');
Router::post('overview', 'WeddingDetailsContoller');

Router::post('login', 'SecurityController');
Router::post('sign', 'SecurityController');
Router::post('logOut', 'SecurityController');
Router::post('account', 'SecurityController');
Router::post('welcomePage', 'DefaultController');

Router::get('addTask', 'CheckListController');
Router::get('updateTaskStatus', 'CheckListController');
Router::get('deleteTask', 'CheckListController');

Router::get('updateStatus', 'GuestListController');
Router::get('updatePlusOne', 'GuestListController');
Router::get('addGuest', 'GuestListController');
Router::get('deleteGuest', 'GuestListController');

Router::get('addBudgetItem', 'BudgetController');
Router::get('deleteBudgetItem', 'BudgetController');

Router::get('editDate', 'SecurityController');
Router::get('editBudget', 'SecurityController');
Router::get('addVendor', 'VendorController');
Router::get('vendorSingle', 'VendorController');
Router::get('addVendorAddress', 'VendorController');


Router::run($path);

?>