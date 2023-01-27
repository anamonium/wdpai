<?php
require_once "AppController.php";
require_once __DIR__.'/../models/WeddingDetails.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/DetailsRepository.php';


class WeddingDetailsContoller extends AppController
{
    private $detailsRepository;

    public function __construct(){
        parent::__construct();
        $this->detailsRepository = new DetailsRepository();
    }

    public function overview(){
        if($_COOKIE['logged_user']) {
            $overview = $this->detailsRepository->getWeddingDetails();
            $this->render('overview', ['overview' => $overview]);
        }
        else{
            $this->render('welcomePage');
        }
    }


}