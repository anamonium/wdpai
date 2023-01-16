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
    {
        $guestList = $this->guestlistrepository->getGuests();
        $this->render('guestList', ['guestList' => $guestList]);
    }

}