<?php
ini_set('session.gc_maxlifetime', 600);
session_start();
require($_SERVER['DOCUMENT_ROOT'] . "./models/AuthDao.php");

class AuthController
{
    private $dao;

    function __construct()
    {
        $this->dao = new AuthDao();
    }

    public function login($data)
    {
        $auth = new Auth($data['email'], $data['password']);

        $validationResult = $this->validate($auth);

        if (!$validationResult) {
            header("location: /login");
        } else {
            $_SESSION['user_id'] = $validationResult['id'];
            $_SESSION['logged_in'] = true;
            header("location: /");
        }
    }

    public function logout()
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            unset($_SESSION['user_id']);
            unset($_SESSION['logged_in']);
            header("location: /");
        } else {
            header("location: /");
        }
    }

    public function validate($auth)
    {
        $email = $auth->getEmail();
        $password = $auth->getPassword();
        $errors = [];

        if (empty($email) || empty($password)) {
            $errors[] = "Preencha todos os campos.";
        } else {
            $res = $this->dao->getUser($auth);
            if ($res === 'USER_NOT_FOUND') {
                $errors[] = "Usuário não encontrado.";
            }
            if ($res === 'CRED_INCORRECT') {
                $errors[] = "Senha incorreta.";
            }
        }

        if (!empty($errors)) {
            $_SESSION["errors"] = $errors;
            return false;
        }

        return $res;
    }
}
