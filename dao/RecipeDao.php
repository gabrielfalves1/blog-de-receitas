<?php

include 'configuration\Connect.php';

include 'models\Recipe.php';

class RecipeDao extends Connect
{
    private $table;

    function __construct()
    {
        parent::__construct();
        $this->table = "recipes";
    }


    public function findAll()
    {
        try {

            $sql = "SELECT * FROM $this->table";
            $stmt = $this->connection->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw new Exception("Erro ao buscar receitas.");
        }
    }

    public function create(Recipe $recipe)
    {
        try {

            $sql = "INSERT INTO $this->table (title, content, user_id) VALUES (:title, :content, :user_id)";
            $stmt = $this->connection->prepare($sql);

            $stmt->bindValue("title", $recipe->getTitle());
            $stmt->bindValue("content", $recipe->getContent());
            $stmt->bindValue("user_id", $recipe->getUserId());

            $stmt->execute();
        } catch (Exception $e) {
            throw new Exception("Erro ao realizar inserção de receita.");
        }
    }

    public function get($id)
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE id = :id";
            $stmt = $this->connection->prepare($sql);

            $stmt->bindValue("id", $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            throw new Exception("Erro ao buscar receita.");
        }
    }
}
