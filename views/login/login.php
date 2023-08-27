<?php
$pageTitle = "Login";
$cssPath = "views\login\login.css";
require($_SERVER['DOCUMENT_ROOT'] . '/configuration/config.php');
$config = new Config();
$config->isLoggedIn();
?>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/views/_header.php'); ?>

<h2 class="text-center">Acesse</h2>

<div class="form d-flex justify-content-center align-items-center p-3">

    <form action="/" method="post">
        <input type="hidden" name="action" value="login">
        <div class="mb-3 ">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label class="form-label">Senha</label>
            <input type="password" class="form-control" name="password">
        </div>

        <div class="errors">
            <?php if (isset($_SESSION['errors']) && is_array($_SESSION['errors'])) {
                foreach ($_SESSION['errors'] as $error) {
                    echo '<p>' . $error . "<br>" . '</p>';
                }
                unset($_SESSION['errors']);
            }  ?>
        </div>

        <div class="options d-flex justify-content-between align-items-center">
            <button type="submit" class="btn-custom">Entrar</button>
            <a href="/register">Cadastre-se</a>
        </div>
    </form>


</div>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/views/_footer.php');
