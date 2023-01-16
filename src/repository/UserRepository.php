<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."users" u LEFT JOIN public."user_details" ud ON u.id_user = ud.id_user WHERE email = :email
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

        $stmt->execute([
            $this->getUserDetailsId($user),
            $user->getName(),
            $user->getSurname(),
            $user->getPhone()
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

}