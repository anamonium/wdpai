<?php

require_once 'AppController.php';

class DefaultController extends AppController{

    public function login(){
        $this->render('login');
    }

    public function mainPage(){
        $this->render('mainPage');
    }

    public function welcomePage(){
        $this->render('welcomePage');
    }

}