<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Vendor.php';
require_once __DIR__.'/../repository/VendorRepository.php';

class VendorController extends AppController
{
    private $vendorRepository;

    public function __construct()
    {
        parent::__construct();
        $this->vendorRepository = new VendorRepository();
    }

    public function vendor(){
        if($_COOKIE['logged_user']) {
            $vendor = $this->vendorRepository->getVendors();
            $role = $this->vendorRepository->checkRole();
            if ($role == 1) {
                $this->render('vendorAdmin', ['vendor' => $vendor]);
            } else {
                $this->render('vendor', ['vendor' => $vendor]);
            }
        }
        else{
            $this->render('welcomePage');
        }
    }

    public function addVendor(){
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            $result =$this->vendorRepository->addVendor($decoded['category'], $decoded['name'], $decoded['description']);

            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode($result);
        }
    }

    public function addVendorAddress($id){
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
            $countryId=$this->vendorRepository->addCountry($decoded['country']);
            $stateId = $this->vendorRepository->addState($countryId, $decoded['state']);
            $addressId = $this->vendorRepository->addVendorAddress($stateId, $decoded['street'], $decoded['bNo'], $decoded['posCo'], $decoded['city']);
            $this->vendorRepository->addVendorsAddress($id, $addressId, $decoded['email'], $decoded['phone']);
            header('Content-type: application/json');
            http_response_code(200);
        }
    }

    public function vendorSingle($id){
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            $result = $this->vendorRepository->getVendorAddresses($id);
            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode($result);
        }



    }

}