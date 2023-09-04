<?php

class RecipeController
{

    public static function index()
    {
        require_once 'dao\RecipeDao.php';
        $recipeDao = new RecipeDao();
        $recipes = $recipeDao->findAll();

        require_once 'views\recipes.php';
    }

    public static function ShowPublishForm()
    {
        require_once './views/publishForm.php';
    }

    public static function ShowRecipeProfile($id)
    {
        require_once 'dao\RecipeDao.php';
        $recipeDao = new RecipeDao();
        $recipe = $recipeDao->get($id);

        require_once 'views\recipeProfile.php';
    }

    public static function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once 'validators\RecipeValidator.php';
            require_once 'dao\RecipeDao.php';

            if (!isset($_SESSION['logged_in']['id'])) header('location: /login/form');
            $id = $_SESSION['logged_in']['id'];

            $recipe = new Recipe();
            $recipe->setTitle($_POST['title']);
            $recipe->setContent($_POST['content']);
            $recipe->setUserId($id);

            $recipeValidator = new RecipeValidator();

            $validatedRecipe = $recipeValidator->validate($recipe);

            if ($validatedRecipe !== null) {
                $recipeDao = new RecipeDao();
                $recipeDao->create($validatedRecipe);

                $_POST = "";

                $msg['ok'] = 'Receita publicada com sucesso!';

                require_once 'views\publishForm.php';

                header("refresh:3;url=/recipe/index");
            } else {
                $msg = $recipeValidator->getMsgs();

                require_once 'views\publishForm.php';
            }
        } else {
            header('/recipe/form');
        }
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
}
