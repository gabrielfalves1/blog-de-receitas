<?php

require($_SERVER['DOCUMENT_ROOT'] . "./controllers/userController.php");
$controller = new USerController();

if (isset($_POST['login'])) {
    print_r($_POST);
} elseif (isset($_POST['create'])) {
    $controller->create($_POST);
} else {
    header("location: /home");
}
