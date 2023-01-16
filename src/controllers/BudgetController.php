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
        $budget = $this->budgetrepository->getBudget();
        $this->render('budget', ['budget' => $budget]);
    }
}