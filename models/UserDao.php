<?php
require($_SERVER['DOCUMENT_ROOT'] . "./configuration/connect.php");
require("User.php");


class UserDao extends Connect
{
    private $table;

    function __construct()
    {
        parent::__construct();
        $this->table = "users";
    }

    public function get()
    {
    }


    public function create(User $user)
    {
        try {
            $sql = "INSERT INTO $this->table (userName, email, password) VALUES (:userName, :email, :password)";

            $stmt = $this->connection->prepare($sql);

            $stmt->bindValue(":userName", $user->getUserName());
            $stmt->bindValue(":email", $user->getEmail());
            $stmt->bindValue(":password", $user->getPassword());

            return $stmt->execute();
        } catch (Exception $e) {
            echo ("Erro ao realizar inserção de usuário") . $e->getMessage();
            die();
        }
    }
}
