<?php

require_once "Repository.php";
require_once __DIR__.'/../models/Task.php';

class CheckListRepository extends Repository
{
    public function getTasks() :array{
        $result = [];

        $user_id = $_COOKIE['logged_user'];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."task" where id_checklist = :user_id;
        ');

        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        $stmt->execute();

        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tasks as $task) {
            $result[] = new Task(
                $task['content'],
                $task['status']
            );
        }

        return $result;
    }

    public function addTask(Task $task){

        $user_id = $_COOKIE['logged_user'];

        $stmt = $this->database->connect()->prepare('
            INSERT INTO public."task" (id_checklist, status, content)
            VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $user_id,
            $task->getStatus(),
            $task->getContent()
        ]);
    }

}