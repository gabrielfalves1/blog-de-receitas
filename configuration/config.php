<?php
//require($_SERVER['DOCUMENT_ROOT'] . "./controllers/UserController.php");
class Config
{
    private $userController;
    private $user;

    public function __construct()
    {
        $this->userController = new UserController();
        $this->user = new User("", "", "");
    }

    public function checkAuth()
    {
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            header("Location: /login");
            exit;
        }
    }

    public function getUser()
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {

            $id = ($_SESSION['user_id']);
            $res = $this->userController->get($id);
            if ($res) {
                $this->user->setId($res['id']);
                $this->user->setUsername($res['username']);
                $this->user->setEmail($res['email']);
                return $this->user;
            } else {
                unset($_SESSION['user_id']);
                unset($_SESSION['logged_in']);
                header("location: /");
            }
            return null;
        }
    }

    public function isLoggedIn()
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            header("Location: /");
            exit;
        }
    }
}
