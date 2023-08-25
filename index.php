<?php

require($_SERVER['DOCUMENT_ROOT'] . "./controllers/userController.php");
$controller = new USerController();

if (isset($_POST['c'])) {
} else {
    $controller->viewHomePage();
}
