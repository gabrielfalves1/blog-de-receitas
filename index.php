<?php
require_once 'controllers\UserController.php';
require_once 'controllers\AuthController.php';
require_once 'controllers\RecipeController.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', $url);

switch ($url) {
    case '/':
        UserController::index();
        break;

    case '/user/form':
        AuthController::showLoginForm();
        break;

    case '/user/store':
        UserController::store();
        break;

    case '/user/register':
        UserController::create();
        break;

    case '/recipe/index':
        RecipeController::index();
        break;

    case '/recipe/publish':
        RecipeController::showPublishForm();
        break;

    case '/recipe/store':
        RecipeController::store();
        break;

    case '/erro':
        echo "Erro 404";
        break;

    default:
        if (count($segments) > 4) {
            header('location: /erro');
        }

        if ($segments[1] === 'perfil') {
            $data = intval(end($segments));
            echo $data;
        } else {
            header('location: /erro');
        }
        break;
}
