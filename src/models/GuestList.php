<?php

class GuestList{

    private $name;
    private $surname;
    private $phone;
    private $plus_one;
    private $status;

    public function __construct($name, $surname, $phone, $plus_one, $status)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->phone = $phone;
        $this->plus_one = $plus_one;
        $this->status = $status;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname): void
    {
        $this->surname = $surname;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    public function getPlusOne()
    {
        return $this->plus_one;
    }

    public function setPlusOne($plus_one): void
    {
        $this->plus_one = $plus_one;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status): void
    {
        $this->status = $status;
    }

}