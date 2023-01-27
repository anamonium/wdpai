<?php

require_once "Repository.php";
require_once __DIR__.'/../models/Budget.php';

class BudgetRepository extends Repository
{
    public function getBudget(): array{
        $result = [];

        $user_id = $_COOKIE['logged_user'];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."budget_item" where id_budget = :user_id;
        ');

        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        $stmt->execute();
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($items as $item) {
            $result[] = new Budget(
                $item['name'],
                $item['cost'],
                $item['id_budget_item']
            );
        }

        return $result;
    }

    public function addBudgetItem($budgetName, $budgetPrice){
        $user_id = $_COOKIE['logged_user'];

        $stmt = $this->database->connect()->prepare('
            INSERT INTO public."budget_item" (id_budget, name, cost)
            VALUES (?, ?, ?) RETURNING id_budget_item, name, cost
        ');

        $stmt->execute([
            $user_id,
            $budgetName,
            $budgetPrice
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['id_budget_item'];
        //return new Budget($result['name'], $result['cost'], $result['id_budget_item']);
    }

    public function getBudgetItem($id){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."budget_item" WHERE id_budget_item = :id
        ');

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        $budgetItem = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$budgetItem) {
            return null;
        }

        return new Budget($budgetItem['name'], $budgetItem['cost'], $budgetItem['id_budget_item']);
    }

    public function deleteBudgetItem($id){

        $budgetItem = $this->getBudgetItem($id);

        if($budgetItem){
            $stmt = $this->database->connect()->prepare("
                DELETE from public.budget_item where id_budget_item = :id
            ");

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }
    }

    public function getBudgetNumbers(){
        $user_id = $_COOKIE['logged_user'];

        $stmt = $this->database->connect()->prepare('
            SELECT * from public."budget" where id_budget = :id;
        ');

        $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        if(!$result){
            return null;
        }

        $info = [];
        $info[0] = $result['beggining_budget'];
        $info[1] = $result['budget_letf'];

        return $info;
    }
}