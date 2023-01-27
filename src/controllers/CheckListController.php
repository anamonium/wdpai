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
        if($_COOKIE['logged_user']) {
            $checklist = $this->checklistrepository->getTasks();
            $checklistInfo = $this->checklistrepository->getTaskCount();
            $this->render('checklist', ['checklist' => $checklist, 'checklistInfo' => $checklistInfo]);
        }else{
            $this->render('welcomePage');
        }
    }

    public function updateTaskStatus(int $id){
        $this->checklistrepository->updateTaskStatus($id);
        http_response_code(200);
    }

    public function deleteTask(int $id){
        $this->checklistrepository->deleteTask($id);
        http_response_code(200);
    }

    public function addTask(){

        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';


        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);
            $result = $this->checklistrepository->addTask($decoded);
            echo json_encode($result);
            //echo json_encode($this->checklistrepository->addTask($decoded));
        }



    }
}