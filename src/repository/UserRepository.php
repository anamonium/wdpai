<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."users" u 
                LEFT JOIN public."user_details" ud ON u.id_user = ud.id_user WHERE email = :email
        ');


        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$user){
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
        );
    }

    public function addUser(User $user)
    {

        $stmt = $this->database->connect()->prepare('
            INSERT INTO public."users" ( email, password)
            VALUES (?, ?)
        ');

        $stmt->execute([
            $user->getEmail(),
            $user->getPassword(),
        ]);


        $stmt = $this->database->connect()->prepare('
            INSERT INTO public."user_details" (id_user, name, surname, phone)
            VALUES (?, ?, ?, ?)
        ');

        $id =$this->getUserDetailsId($user);

        $stmt->execute([
            $id,
            $user->getName(),
            $user->getSurname(),
            $user->getPhone()
        ]);

        $stmt = $this->database->connect()->prepare(
            'INSERT INTO public."admins"(role, id_user) VALUES (?, ?)'
        );
        $stmt->execute([
            1,
            $id
        ]);

        $stmt = $this->database->connect()->prepare('
            INSERT INTO public."wedding_details" (id_wedding_details) VALUES (?)
        ');

        $stmt->execute([
            $id
        ]);

        $stmt = $this->database->connect()->prepare('
            INSERT INTO public."guest_list" (id_guest_list, invited, accepted) VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $id,
            0,
            0
        ]);

        $stmt = $this->database->connect()->prepare('
            INSERT INTO public."checklist" (id_checklist, subtask_done, all_subtask) VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $id,
            0,
            0
        ]);

        $stmt = $this->database->connect()->prepare('
            INSERT INTO public."budget" (id_budget, beggining_budget, budget_letf) VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $id,
            0,
            0
        ]);

    }

    public function getUserDetailsId(User $user): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."users" WHERE email = :email
        ');

        $email = $user->getEmail();

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data['id_user'];
    }

    public function getUserDetailsAccount(): ?array
    {

        $user_id = $_COOKIE['logged_user'];

        $stmt = $this->database->connect()->prepare('
            SELECT name, surname, email, beggining_budget, wedding_date from users
                join user_details on users.id_user = user_details.id_user
                join budget on users.id_user = budget.id_budget 
                join wedding_details on users.id_user = wedding_details.id_wedding_details
                where users.id_user = :id;
        ');

        $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        $details = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$details)
            return null;

        $user = new User($details['email'], " ", $details['name'], $details['surname']);

        $result = [];
        $result[0] = $user;
        $result[1] = $details['beggining_budget'];
        $result[2] = $details['wedding_date'];

        return $result;
    }

    public function editDate($date){

        $user_id = $_COOKIE['logged_user'];
        $stmt = $this->database->connect()->prepare("
            UPDATE public.wedding_details SET wedding_date = :date where id_wedding_details = :id;
        ");

        $stmt->bindParam(':date', $date, PDO::PARAM_INT);
        $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function editBudget($budget){
        $user_id = $_COOKIE['logged_user'];
        $stmt = $this->database->connect()->prepare("
            UPDATE public.budget SET beggining_budget = :date where id_budget = :id;
        ");

        $stmt->bindParam(':date', $budget, PDO::PARAM_INT);
        $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
    }

}