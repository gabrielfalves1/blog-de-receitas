<?php

class UserController
{

    public static function index()
    {
        require_once "./views/home.php";
    }

    public static function create()
    {
        require_once "./views/registerForm.php";
    }

    public function get($id)
    {
    }

    public function getAll()
    {
    }

    public static function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once 'models/User.php';
            require_once 'validators/UserValidator.php';
            require_once 'dao/UserDao.php';

            $user = new User();
            $user->setUsername($_POST['username']);
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);

            $userValidator = new UserValidator();
            $validatedUser = $userValidator->validate($user);

            if ($validatedUser !== null) {
                $userDao = new UserDao();
                $userDao->create($validatedUser);

                $msg['ok'] = "Usuário cadastrado com sucesso.<br>Faça login para continuar.";
                require_once "./views/registerForm.php";

                header("Refresh: 3; url=/user/form");
            } else {
                $msg = $userValidator->getMsgs();
                require_once "./views/registerForm.php";
            }
        } else {
            header('location: /user/register');
        }
    }
}
