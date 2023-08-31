<?php

class LoginController
{

    public static function showLoginForm()
    {
        include_once 'views\loginForm.php';
    }


    public static function authenticate()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once 'models\Login.php';
            require_once 'dao\LoginDao.php';

            if (empty($_POST['email']) || empty($_POST['password'])) {
                $msg['all'] = 'Preencha todos os camposs!';
                include_once 'views\loginForm.php';
            } else {
                $login = new Login($_POST['email'], $_POST['password']);

                $loginDao = new LoginDao();
                $loginResponse = $loginDao->checkCredentials($login);

                if ($loginResponse) {

                    $_SESSION['logged_in'] = [
                        'id' => $loginResponse['id'],
                        'username' => $loginResponse['username']
                    ];


                    header("location:/recipe/index");
                } else {
                    $msg['all'] = 'Email ou senha incorretos.';
                    include_once 'views\loginForm.php';
                }
            }
        } else {
            header('location: /login/form');
        }
    }

    public static function logout()
    {
        session_destroy();
        header('location: /login/form');
    }
}
