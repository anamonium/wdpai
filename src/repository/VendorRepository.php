<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/Address.php';
require_once __DIR__.'/../models/VendorAddress.php';
require_once __DIR__.'/../models/Vendor.php';

class VendorRepository extends Repository
{
    public function getAddress($id_address){
        $stmt = $this->database->connect()->prepare('
            SELECT a.*, s.name as state, c.name as country from public."address" a join  public."state" s 
            ON a.id_state = s.id_state join public."country" c on c.id_country = s.id_country
            WHERE a.id_address = :id_address 
        ');

        $stmt->bindParam(':id_address', $id_address, PDO::PARAM_INT);
        $stmt->execute();

        $address = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$address)
            return null;

        return new Address(
            $address['street'],
            $address['building_number'],
            $address['postal_code'],
            $address['city'],
            $address['state'],
            $address['country']
        );
    }

    //zwraca tab adresow
    public function getVendorAddresses($id_vendor){

        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * from public."vendors_addresses" where id_vendor = :id_vendor
        ');

        $stmt->bindParam(':id_vendor', $id_vendor, PDO::PARAM_INT);
        $stmt->execute();

        $addresses = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($addresses as $address){
            $result[] = new VendorAddress(
                $address['email'],
                $address['phone'],
                $this->getAddress($address['id_address'])
            );
        }

        return $result;


    }

    public function getCategory($id_category){
        $stmt = $this->database->connect()->prepare('
            SELECT * from public."vendor_category" where id_vendor_category = :id_category
        ');

        $stmt->bindParam(':id_category', $id_category, PDO::PARAM_INT);
        $stmt->execute();

        $category = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$category)
            return null;

        return $category['name'];
    }

    public function getVendors(){
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."vendors"
        ');

        $stmt ->execute();

        $vendors = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($vendors as $vendor){
            $result[] = new Vendor(
                $vendor['name'],
                $vendor['description'],
                $this->getCategory($vendor['id_vendor_category']),
                $this->getVendorAddresses($vendor['id_vendor'])
            );
        }

        return $result;

    }
}