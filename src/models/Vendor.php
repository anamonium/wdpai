<?php

class Vendor
{
    private $name;
    private $description;
    private $category;
    private $addresses; //array


    public function __construct($name, $description, $category, $addresses)
    {
        $this->name = $name;
        $this->description = $description;
        $this->category = $category;
        $this->addresses = $addresses;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category): void
    {
        $this->category = $category;
    }

    public function getAddresses()
    {
        return $this->addresses;
    }

    public function setAddresses($addresses): void
    {
        $this->addresses = $addresses;
    }


}