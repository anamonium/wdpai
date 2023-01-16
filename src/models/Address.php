<?php

class Address
{
    private $street;
    private $building_number;
    private $postal_code;
    private $city;
    private $state;
    private $country;

    public function __construct($street, $building_number, $postal_code, $city, $state, $country)
    {
        $this->street = $street;
        $this->building_number = $building_number;
        $this->postal_code = $postal_code;
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function setStreet($street): void
    {
        $this->street = $street;
    }


    public function getBuildingNumber()
    {
        return $this->building_number;
    }

    public function setBuildingNumber($building_number): void
    {
        $this->building_number = $building_number;
    }

    public function getPostalCode()
    {
        return $this->postal_code;
    }

    public function setPostalCode($postal_code): void
    {
        $this->postal_code = $postal_code;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city): void
    {
        $this->city = $city;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state): void
    {
        $this->state = $state;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country): void
    {
        $this->country = $country;
    }


}