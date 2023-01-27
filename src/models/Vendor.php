<?php

class Vendor
{
    private $id;
    private $name;
    private $description;
    private $category;

    public function __construct($name, $description, $category, $id)
    {
        $this->name = $name;
        $this->description = $description;
        $this->category = $category;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
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


}