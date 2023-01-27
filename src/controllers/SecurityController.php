<?php
require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/DetailsRepository.php';

class SecurityController extends AppController {

    public function login(){   
        //$user = new User('jsnow@pk.edu.pl', 'admin', 'Johnny', 'Snow');

        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $userRepository->getUser($email);

        if(!$user){
            return $this->render('login', ['messages' => ['User does not exist!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        $hashed_password = $user->getPassword();
        if (!password_verify($password, $hashed_password)) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        $cookie_value = $userRepository->getUserDetailsId($user);
        setcookie('logged_user', $cookie_value, 0, '/');

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/overview");
    }

    public function sign(){

        if (!$this->isPost()) {
            return $this->render('sign');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $confirmedPassword = $_POST['passwordconfirm'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];

        if ($password != $confirmedPassword) {
            return $this->render('sign', ['messages' => ['Please provide proper password']]);
        }

        $user = new User($email, $hashed_password, $name, $surname);

        $userRepository = new UserRepository();
        $userRepository->addUser($user);


        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);

    }

    public function account(){
        if($_COOKIE['logged_user']) {
            $userRepository = new UserRepository();
            $account = $userRepository->getUserDetailsAccount();
            return $this->render('account', ['account' => $account]);
        }else{
            $this->render('welcomePage');
        }
    }

    public function logOut(){
        return $this->render('welcomePage');
    }

    public function editBudget(){
        $userRepository = new UserRepository();
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            $userRepository->editBudget($decoded);
        }
    }

    public function editDate(){
        $userRepository = new UserRepository();
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);
            $userRepository->editDate($decoded);

        }
    }

}
