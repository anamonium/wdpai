<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/Address.php';
require_once __DIR__.'/../models/Vendor.php';

class VendorRepository extends Repository
{

    public function getVendorAddresses($id_vendor): array
    {
        $stmt = $this->database->connect()->prepare('
            select email, phone, street, building_number, postal_code, city, s.name as state, c.name as country from "vendors_addresses"
                join address a on vendors_addresses.id_address = a.id_address
                join state s on a.id_state = s.id_state
                join country c on s.id_country = c.id_country
            where vendors_addresses.id_vendor = :id_vendor;
        ');

        $stmt->bindParam(':id_vendor', $id_vendor, PDO::PARAM_INT);
        $stmt->execute();

        $addresses = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $addresses;

    }

    public function getVendors(): array
    {
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
                $vendor['vendor_category'],
                $vendor['id_vendor']
            );
        }

        return $result;

    }

    public function checkRole(): ?int
    {
        $user_id = $_COOKIE['logged_user'];

        $stmt = $this->database->connect()->prepare('
            SELECT * from public."admins" where id_user = :id;
        ');

        $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user["role"] === 2)
            return 1;
        else
            return 0;
    }

    public function addCountry($country){
        $checkIfExists = $this->database->connect()->prepare(
            'Select * from public."country" where name = :name;'
        );
        $checkIfExists->bindParam(':name', $country, PDO::PARAM_STR);
        $checkIfExists->execute();
        $countryGet= $checkIfExists->fetch(PDO::FETCH_ASSOC);

        if($countryGet)
            return $countryGet['id_country'];

        $stmt = $this->database->connect()->prepare('
            INSERT INTO public."country" (name)
            VALUES (?) RETURNING id_country
        ');

        $stmt->execute([
            $country
        ]);

        $countryGet = $stmt->fetch(PDO::FETCH_ASSOC);

        return $countryGet['id_country'];
    }

    public function addState($id_country, $state){

        $checkIfExists = $this->database->connect()->prepare(
            'Select * from public."country" where name = :name and id_country = :id;'
        );
        $checkIfExists->bindParam(':name', $state, PDO::PARAM_STR);
        $checkIfExists->bindParam(':id', $id_country, PDO::PARAM_INT);
        $checkIfExists->execute();
        $stateGet= $checkIfExists->fetch(PDO::FETCH_ASSOC);

        if($stateGet)
            return $stateGet['id_state'];

        $stmt = $this->database->connect()->prepare('
            INSERT INTO public."state" (id_country, name)
            VALUES (?,?) RETURNING id_state
        ');

        $stmt->execute([
            $id_country,
            $state
        ]);

        $stateGet =  $stmt->fetch(PDO::FETCH_ASSOC);
        return $stateGet['id_state'];
    }

    public function addVendorAddress($id,$phone, $email, $id_state, $street, $buildNo, $postalCode, $city){
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public."address" (id_state, street, building_number, postal_code, city)
            VALUES (?,?,?,?,?) RETURNING id_address
        ');

        $stmt->execute([
            $id_state,
            $street,
            $buildNo,
            $postalCode,
            $city
        ]);

        $address = $stmt->fetch(PDO::FETCH_ASSOC);
        $add =  $address['id_address'];

        $stmt = $this->database->connect()->prepare('
            INSERT INTO public."vendors_addresses" (id_vendor, id_address, email, phone)
            VALUES (?,?,?,?)
        ');

        $stmt->execute([
            $id,
            $add,
            $email,
            $phone
        ]);
    }

    public function addVendor($vendorCat, $name, $description){
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public."vendors" (vendor_category, name, description)
            VALUES (?,?,?) RETURNING id_vendor
        ');

        $stmt->execute([
            $vendorCat,
            $name,
            $description
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


}