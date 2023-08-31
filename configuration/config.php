<?php

class Config
{
    public static function checkAuth()
    {
        if (!isset($_SESSION['logged_in'])) {
            header("Location: /login/form");
            exit;
        }
    }

    public static  function isLoggedIn()
    {
        if (isset($_SESSION['logged_in'])) {
            header("Location: /");
            exit;
        }
    }
}
