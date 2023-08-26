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
            echo ("Erro ao realizar inserção de usuário.") . $e->getMessage();
        }
    }

    public function isEmailRegistered($email)
    {

        try {
            $sql = "SELECT email FROM $this->table WHERE email = :email";

            $stmt = $this->connection->prepare($sql);

            $stmt->bindValue(":email", $email);
            $stmt->execute();

            $rowCount = $stmt->rowCount();
            return $rowCount > 0;
        } catch (Exception $e) {
            echo ("Erro ao verificar email.") . $e->getMessage();
        }
    }

    public function isUsernameRegistered($username)
    {

        try {
            $sql = "SELECT username FROM $this->table WHERE username = :username";

            $stmt = $this->connection->prepare($sql);

            $stmt->bindValue(":username", $username);
            $stmt->execute();

            $rowCount = $stmt->rowCount();
            return $rowCount > 0;
        } catch (Exception $e) {
            echo ("Erro ao verificar nome de usuário.") . $e->getMessage();
        }
    }
}
