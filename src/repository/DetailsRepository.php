<?php
require_once "Repository.php";
require_once __DIR__.'/../models/WeddingDetails.php';
require_once __DIR__.'/../models/UsersVendor.php';

class DetailsRepository extends Repository
{
    public function getWeddingDetails(){
        $user_id = $_COOKIE['logged_user'];

        $stmt = $this->database->connect()->prepare('
        select wedding_date, beggining_budget, budget_letf, subtask_done, all_subtask, invited, accepted
        from wedding_details
            join budget b on wedding_details.id_wedding_details = b.id_budget
            join checklist c on wedding_details.id_wedding_details = c.id_checklist
            join guest_list gl on wedding_details.id_wedding_details = gl.id_guest_list
            where wedding_details.id_wedding_details = :id;
        ');

//        $stmt = $this->database->connect()->prepare('
//            SELECT "wedding_details".wedding_date, "budget".beggining_budget,
//                   "budget".budget_letf, "checklist".subtask_done,
//                   "checklist".all_subtask, "guest_list".invited, "guest_list".accepted
//            FROM public."wedding_details", public."budget", public."checklist",
//                 public."guest_list"
//            WHERE
//                "wedding_details".id_wedding_details = :id AND "budget".id_budget = :id AND
//                "checklist".id_checklist = :id AND "guest_list".id_guest_list = :id
//        ');

        $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        $details = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$details)
            return null;

        return new WeddingDetails($details['wedding_date'], $details['invited'],
        $details['accepted'], $details['all_subtask'], $details['subtask_done'],
        $details['beggining_budget'], $details['budget_letf']);

    }

}