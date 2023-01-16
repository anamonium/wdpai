<?php

require_once "AppController.php";
require_once __DIR__.'/../models/Task.php';
require_once __DIR__.'/../repository/CheckListRepository.php';

class CheckListController extends AppController
{
    private $checklistrepository;

    public function __construct(){
        parent::__construct();
        $this->checklistrepository = new CheckListRepository();
    }

    public function checklist(){
        $checklist = $this->checklistrepository->getTasks();
        $this->render('checklist', ['checklist' => $checklist]);
    }

    public function addTask(){
        $content = $_POST['taskContent'];
        $status = false;

        $task = new Task($content, $status);
        $this->checklistrepository->addTask($task);

        return $this->render('checklist');
    }
}