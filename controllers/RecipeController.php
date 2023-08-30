<?php

class RecipeController
{

    public static function index()
    {
        include 'models\RecipeDao.php';
        $dao = new RecipeDao();

        $recipes = $dao->getAll();

        include 'views\recipes.php';
    }


    public static function ShowPublishForm()
    {
        include './views/publishForm.php';
    }

    public static function store()
    {
    }


    /* public function create($data)
    {
        $recipe = new Recipe($_SESSION['user_id'], $data['title'], $data['content']);

        $validationResult = $this->validate($recipe);

        if (!$validationResult) {
            header("location: /publish");
        } else {
            $this->dao->create($validationResult);
            header("location: /");
        }
    }

*/
    public function validate(Recipe $recipe)
    {
        $user_id = $recipe->getUserId();
        $title = trim(htmlspecialchars($recipe->getTitle()));
        $content =  trim(htmlspecialchars($recipe->getContent()));
        $fd = [];
        $errors = [];

        if (empty($user_id) || empty($title) || empty($content)) {
            $errors[] = "Preencha todos os campos.";
        }

        if (strlen($title) > 80) {
            $errors[] = "O título só pode ter até 80 caracteres.";
        }

        if (strlen($title) < 5) {
            $errors[] = "O título precisa ter no mínimo 5 caracteres.";
        }

        if (strlen($content) > 5000) {
            $errors[] = "O contéudo só pode ter até 5000 caracteres.";
        }

        if (strlen($content) < 10) {
            $errors[] = "O contéudo precisa ter no mínimo 10 caracteres.";
        }

        if (!empty($errors)) {
            $fd = ['error' => $errors];
        }

        $recipe->setTitle($title);
        $recipe->setContent($content);

        return true;
    }
}
