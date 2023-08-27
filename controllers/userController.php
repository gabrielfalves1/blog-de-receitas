<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . "./models/UserDao.php");

class UserController
{
    private $dao;

    function __construct()
    {
        $this->dao = new UserDao();
    }

    public function get()
    {
        $resultData = $this->dao->get();
        require($_SERVER['DOCUMENT_ROOT'] . "./views/index.php");
    }

    public function create($data)
    {
        $user = new User($data['username'], $data['email'], $data['password']);

        $validationResult =  $this->validate($user);

        if (!$validationResult) {
            header("location: /register");
        } else {
            $this->dao->create($validationResult);
            header("location: /home");
        }
    }


    public function validate(User $user)
    {
        $username = trim($user->getUserName());
        $email = trim($user->getEmail());
        $password = $user->getPassword();
        $errors = [];

        if (empty($username) || empty($email) || empty($password)) {
            $errors[] = "Preencha todos os campos.";
        }

        if (strlen($username) > 15) {
            $errors[] = "Nome de usuário só pode conter até 15 caracteres.";
        }

        if (strlen($username) > 3) {
            $errors[] = "Nome de usuário precisa ter no mínimo 3 caracteres.";
        }

        $emailExists =  $this->dao->isEmailRegistered($email);

        if ($emailExists) {
            $errors[] = "Email já cadastrado em nosso sistema.";
        }

        $usernameExists = $this->dao->isUsernameRegistered($username);

        if ($usernameExists) {
            $errors[] = "Nome de usuário já cadastrado em nosso sistema.";
        }

        if (!empty($errors)) {
            $_SESSION["errors"] = $errors;
            return false;
        }

        $user->setUsername($username);
        $user->setEmail($email);
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $user->setPassword($hashedPassword);

        return $user;
    }
}
