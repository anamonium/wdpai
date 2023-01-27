<?php

require_once "AppController.php";
require_once __DIR__.'/../models/GuestList.php';
require_once __DIR__.'/../repository/GuestListRepository.php';

class GuestListController extends AppController
{

    private $guestlistrepository;

    public function __construct()
    {
        parent::__construct();
        $this->guestlistrepository = new GuestListRepository();
    }

    public function guestList()
    {   if($_COOKIE['logged_user']) {
            $guestList = $this->guestlistrepository->getGuests();
            $guestListInfo = $this->guestlistrepository->getGuestListCount();
            $this->render('guestList', ['guestList' => $guestList, 'guestListInfo' => $guestListInfo]);
        }else{
            $this->render('welcomePage');
        }
    }

    public function updateStatus(int $id){
        $this->guestlistrepository->updateStatus($id);
        http_response_code(200);
    }

    public function updatePlusOne(int $id){
        $this->guestlistrepository->updatePlusOne($id);
        http_response_code(200);
    }

    public function addGuest(){

        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';


        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            $result = $this->guestlistrepository->addGuest($decoded["name"], $decoded["surname"], $decoded["phone"]);
            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode($result);
        }
    }

    public function deleteGuest(int $id){
        $this->guestlistrepository->deleteGuest($id);
        http_response_code(200);
    }

}