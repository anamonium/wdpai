<?php

class Budget
{
    private $name;
    private $cost;
    private $id;

    public function __construct($name, $cost, $id = null )
    {
        $this->name = $name;
        $this->cost = $cost;
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function setCost($cost): void
    {
        $this->cost = $cost;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }



}