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
        $vendor = $this->vendorRepository->getVendors();
        $this->render('vendor', ['vendor' => $vendor]);
    }
}