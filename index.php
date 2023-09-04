<?php
session_start();
include_once 'configuration\Config.php';
require_once 'controllers\UserController.php';
require_once 'controllers\LoginController.php';
require_once 'controllers\RecipeController.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', $url);

switch ($url) {
    case '/':
        UserController::index();
        break;

    case '/login/form':
        Config::isLoggedIn();
        LoginController::showLoginForm();
        break;

    case '/login/auth':
        Config::isLoggedIn();
        LoginController::authenticate();
        break;

    case '/user/register':
        Config::isLoggedIn();
        UserController::showRegisterForm();
        break;

    case '/user/store':
        Config::isLoggedIn();
        UserController::store();
        break;

    case '/recipe/index':
        RecipeController::index();
        break;

    case '/recipe/form':
        Config::checkAuth();
        RecipeController::showPublishForm();
        break;

    case '/recipe/store':
        Config::checkAuth();
        RecipeController::store();
        break;

    case '/user/profile':
        Config::checkAuth();
        break;

    case '/login/logout':
        LoginController::logout();
        break;


    default:
        if (count($segments) === 3 && $segments[1] === 'recipe') {
            $id = intval($segments[2]);
            RecipeController::ShowRecipeProfile($id);
        } else {
            echo "Erro 404";
        }
}
