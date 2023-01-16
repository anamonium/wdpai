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
                $item['cost']
            );
        }

        return $result;
    }

    public function addBudgetItem(Budget $budget){
        $user_id = $_COOKIE['logged_user'];

        $stmt = $this->database->connect()->prepare('
            INSERT INTO public."budget_item" (id_budget, name, cost)
            VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $user_id,
            $budget->getName(),
            $budget->getCost()
        ]);
    }
}