<?php

class WeddingDetails
{
    private $weddingDate;
    private $guestNumber;
    private $guestAccepted;
    private $allTasks;
    private $tasksDone;
    private $allBudget;
    private $budgetLeft;

    public function __construct($weddingDate, $guestNumber, $guestAccepted, $allTasks, $tasksDone, $allBudget, $budgetLeft)
    {
        $this->weddingDate = $weddingDate;
        $this->guestNumber = $guestNumber;
        $this->guestAccepted = $guestAccepted;
        $this->allTasks = $allTasks;
        $this->tasksDone = $tasksDone;
        $this->allBudget = $allBudget;
        $this->budgetLeft = $budgetLeft;
    }


    public function getWeddingDate()
    {
        return $this->weddingDate;
    }

    public function setWeddingDate($weddingDate): void
    {
        $this->weddingDate = $weddingDate;
    }

    public function getGuestNumber()
    {
        return $this->guestNumber;
    }

    public function setGuestNumber($guestNumber): void
    {
        $this->guestNumber = $guestNumber;
    }

    public function getGuestAccepted()
    {
        return $this->guestAccepted;
    }

    public function setGuestAccepted($guestAccepted): void
    {
        $this->guestAccepted = $guestAccepted;
    }

    public function getAllTasks()
    {
        return $this->allTasks;
    }

    public function setAllTasks($allTasks): void
    {
        $this->allTasks = $allTasks;
    }

    public function getTasksDone()
    {
        return $this->tasksDone;
    }

    public function setTasksDone($tasksDone): void
    {
        $this->tasksDone = $tasksDone;
    }

    public function getAllBudget()
    {
        return $this->allBudget;
    }

    public function setAllBudget($allBudget): void
    {
        $this->allBudget = $allBudget;
    }

    public function getBudgetLeft()
    {
        return $this->budgetLeft;
    }

    public function setBudgetLeft($budgetLeft): void
    {
        $this->budgetLeft = $budgetLeft;
    }
    


}