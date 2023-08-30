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


    public function getAll()
    {
        try {

            $sql = "SELECT * FROM $this->table";

            $stmt = $this->connection->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo ("Erro ao buscar receitas.") . $e->getMessage();
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
            echo ("Erro ao realizar inserção de receita.") . $e->getMessage();
        }
    }
}
