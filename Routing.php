<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/GuestListController.php';
require_once 'src/controllers/CheckListController.php';
require_once 'src/controllers/BudgetController.php';
require_once 'src/controllers/VendorController.php';
require_once 'src/controllers/WeddingDetailsContoller.php';

class Router{

    public static $routes; //url and opened controller

    //allows us to insert url controller into an array
    public static function get($url, $view) {
        self::$routes[$url] = $view;
    }
    
    public static function post($url, $view) {
      self::$routes[$url] = $view;
    }

      //allows us to run a url controller
    public static function run ($url) {

        $urlParts = explode("/", $url);
        $action = $urlParts[0];

        //check if an element exists in routes array
        if (!array_key_exists($action, self::$routes)) {
          die("Wrong url!");
        }
    
        $controller = self::$routes[$action];
        $object = new $controller;
        $action = $action ?: 'welcomePage';

        $id = $urlParts[1];

        $object->$action($id);
    }
}