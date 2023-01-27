<?php

require_once __DIR__.'/../../Database.php';

class Repository
{
    protected $database;
    protected $user_id;

    public function __construct(){
        $this->database = new Database();
    }

    protected function setUserId($value){
        $this->user_id = $value;
    }

    protected function getUserId(){
        return $this->user_id;
    }
}