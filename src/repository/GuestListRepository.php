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
            $guest['status'],
            $guest['id_guest']
        );
    }

    public function addGuest($name, $surname, $phone)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public."guests" (id_guestlist, name, surname, phone, plus_one, status)
            VALUES (?, ?, ?, ?, ?, ?) RETURNING id_guest, name, surname, phone
        ');

        $user_id = $_COOKIE['logged_user'];

        $stmt->execute([
            $user_id,
            $name,
            $surname,
            $phone,
            0,
            0
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['id_guest'];
//        return new GuestList($result['name'], $result['surname'], $result['phone'],false , false,$result['id_guest']);

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
                $guest['status'],
                $guest['id_guest']
            );
        }

        return $result;
    }

    public function updatePlusOne(int $id){
        $guest = $this->getGuest($id);


        if($guest){
            if($guest->getPlusOne()){
                $stmt = $this->database->connect()->prepare("
                    UPDATE public.guests SET plus_one = false where id_guest = :id;
                ");
            }
            else{
                $stmt = $this->database->connect()->prepare("
                    UPDATE public.guests SET plus_one = true where id_guest = :id;
                ");
            }

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }
    }

    public function updateStatus(int $id){

        $guest = $this->getGuest($id);

        if ($guest){
            if($guest->getStatus()){
                $stmt = $this->database->connect()->prepare("
                    UPDATE public.guests SET status = false where id_guest = :id;
                ");
            }
            else{
                $stmt = $this->database->connect()->prepare("
                    UPDATE public.guests SET status = true where id_guest = :id;
                ");
            }

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }
    }

    public function getGuestListCount(): ?array
    {
        $user_id = $_COOKIE['logged_user'];

        $stmt = $this->database->connect()->prepare('
            SELECT * from public."guest_list" where id_guest_list = :id;
        ');

        $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        if(!$result){
            return null;
        }

        $info = [];
        $info[0] = $result['invited'];
        $info[1] = $result['accepted'];

        return $info;
    }

    public function deleteGuest($id){
        $guest = $this->getGuest($id);

        if($guest){
            $stmt = $this->database->connect()->prepare("
                DELETE from public.guests where id_guest = :id
            ");

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }
    }

}