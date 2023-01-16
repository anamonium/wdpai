<?php

require_once "Repository.php";
require_once __DIR__.'/../models/GuestList.php';

class GuestListRepository extends Repository{

    public function getGuest(int $id_guest): ?GuestList{
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."guests" WHERE id_guest = :id_guest
        ');

        $stmt->bindParam(':id_guest', $id_guest, PDO::PARAM_INT);

        $stmt->execute();

        $guest = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($guest == false) {
            return null;
        }

        return new GuestList(
            $guest['name'],
            $guest['surname'],
            $guest['phone'],
            $guest['plus_one'],
            $guest['status']
        );
    }

    public function addGuest(GuestList $guest){
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public."guests" (id_guestlist, name, surname, phone, plus_one, status)
            VALUES (?, ?, ?, ?, ?, ?)
        ');

        $user_id = $_COOKIE['logged_user'];

        $stmt->execute([
            $user_id,
            $guest->getName(),
            $guest->getSurname(),
            $guest->getPhone(),
            $guest->getPlusOne(),
            $guest->getStatus()
        ]);
    }

    public function getGuests(): array{

        $user_id = $_COOKIE['logged_user'];

        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."guests" where id_guestlist = :user_id;
        ');

        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        $stmt->execute();
        $guests = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($guests as $guest) {
            $result[] = new GuestList(
                $guest['name'],
                $guest['surname'],
                $guest['phone'],
                $guest['plus_one'],
                $guest['status']
            );
        }

        return $result;
    }


}