<?php

require_once "AppController.php";
require_once __DIR__.'/../models/Budget.php';
require_once __DIR__.'/../repository/BudgetRepository.php';

class BudgetController extends AppController
{
    private $budgetrepository;

    public function __construct(){
        parent::__construct();
        $this->budgetrepository = new BudgetRepository();
    }

    public function budget(){
        if($_COOKIE['logged_user']) {
            $budget = $this->budgetrepository->getBudget();
            $budgetInfo = $this->budgetrepository->getBudgetNumbers();
            $this->render('budget', ['budget' => $budget, 'budgetInfo' => $budgetInfo]);
        }
        else{
            $this->render('welcomePage');
        }
    }

    public function addBudgetItem(){
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';


        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            $result = $this->budgetrepository->addBudgetItem($decoded["name"], $decoded["cost"]);
            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode($result);
        }
    }

    public function deleteBudgetItem($id){
        $this->budgetrepository->deleteBudgetItem($id);
        http_response_code(200);
    }
}