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
                $task['status'],
                $task['id_task']
            );
        }

        return $result;
    }

    public function addTask(string $description)
    {

        $user_id = $_COOKIE['logged_user'];

        $stmt = $this->database->connect()->prepare('
            INSERT INTO public."task" (id_checklist, status, content)
            VALUES (?, ?, ?) RETURNING id_task, content
        ');

        $stmt->execute([
            $user_id,
            0,
            $description
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['id_task'];
        //return new Task($result['content'], false, $result['id_task']);
    }

    public function getTask(int $id): ?Task{

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."task" where id_task = :id;
        ');

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$result){
            return null;
        }

        return new Task(
            $result['content'],
            $result['status'],
            $result['id_task']
        );
    }

    public function updateTaskStatus(int $id){

        $task = $this->getTask($id);


        if($task){
            if($task->getStatus()){
                $stmt = $this->database->connect()->prepare("
                    UPDATE public.task SET status = false where id_task = :id;
                ");
            }
            else{
                $stmt = $this->database->connect()->prepare("
                    UPDATE public.task SET status = true where id_task = :id;
                ");
            }

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }

    }

    public function deleteTask(int $id){
        $task = $this->getTask($id);

        if($task){
            $stmt = $this->database->connect()->prepare("
                DELETE from public.task where id_task = :id
            ");

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }
    }

    public function getTaskCount(): ?array
    {
        $user_id = $_COOKIE['logged_user'];

        $stmt = $this->database->connect()->prepare('
            SELECT * from public."checklist" where id_checklist = :id;
        ');

        $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        if(!$result){
            return null;
        }

        $info = [];
        $info[0] = $result['subtask_done'];
        $info[1] = $result['all_subtask'];

        return $info;
    }

}