<?php

require($_SERVER['DOCUMENT_ROOT'] . "./models/UserDao.php");

$user = new User();


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
        $result = $this->dao->create($data);
    }


    public function viewHomePage()
    {
        require($_SERVER['DOCUMENT_ROOT'] . "./views/home.php");
    }
}
