<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action === 'login') {
            require_once("./controllers/AuthController.php");
            $authController = new AuthController();
            $authController->login($_POST);
        } elseif ($action === 'create') {
            require_once("./controllers/UserController.php");
            $userController = new UserController();
            $userController->create($_POST);
        } elseif ($action === 'logout') {
            require_once("./controllers/AuthController.php");
            $authController = new AuthController();
            $authController->logout();
        } else {
        }
    } else {
        header("location: /home");
    }
} else {
    header("location: /home");
}
