<?php
require_once 'configuration\Connect.php';
require_once 'dao\LoginDao.php';

class LoginDao extends Connect
{
    private $table;

    function __construct()
    {
        parent::__construct();
        $this->table = "users";
    }

    public function checkCredentials(Login $login)
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE email = :email LIMIT 1";

            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(":email", $login->getEmail());
            $stmt->execute();
            $userRow = $stmt->fetch();

            if ($userRow) {
                $passwordVerify = password_verify($login->getPassword(), $userRow['password']);

                if ($passwordVerify) {
                    return $userRow;
                } else {
                    return false;
                }
            }

            return false;
        } catch (Exception $e) {
            throw new Exception("Erro ao verificar dados de usuário.");
        }
    }
}
