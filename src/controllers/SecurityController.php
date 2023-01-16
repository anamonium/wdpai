<?php
require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

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

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        $cookie_value = $userRepository->getUserDetailsId($user);
        setcookie('logged_user', $cookie_value, 0, '/');

        return $this->render('mainPage');

        //$url = "http://$_SERVER[HTTP_HOST]";
        //header("Location: {$url}/mainPage");
    }

    public function sign(){

        if (!$this->isPost()) {
            return $this->render('sign');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['passwordconfirm'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];

        if ($password != $confirmedPassword) {
            return $this->render('sign', ['messages' => ['Please provide proper password']]);
        }

        $user = new User($email, $password, $name, $surname);

        $userRepository = new UserRepository();
        $userRepository->addUser($user);


        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);

    }
}
