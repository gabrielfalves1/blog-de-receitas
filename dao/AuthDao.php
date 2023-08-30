<?php
require($_SERVER['DOCUMENT_ROOT'] . "./configuration/Connect.php");

require("Auth.php");

class AuthDao extends Connect
{
    private $table;

    function __construct()
    {
        parent::__construct();
        $this->table = "users";
    }

    public function getUser(Auth $auth)
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE email = :email LIMIT 1";

            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(":email", $auth->getEmail());
            $stmt->execute();

            $res = $stmt->fetch();

            if ($res) {
                $passwordVerify = password_verify($auth->getPassword(), $res['password']);
                if ($passwordVerify) {
                    return $res;
                } else {
                    return "CRED_INCORRECT";
                }
            }

            return "USER_NOT_FOUND";
        } catch (Exception $e) {
            throw new Exception("Erro ao verificar dados de usuário: " . $e->getMessage());
        }
    }
}
