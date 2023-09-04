<?php
$pageTitle = 'Perfil da receita';
require_once 'views\_header.php'; ?>

<?php if ($recipe) : ?>

    <h2><?php echo $recipe['title']; ?></h2>

    <div class="container">

        <p><?php echo $recipe['content']; ?></p>



    </div>


<?php else : ?>

    <p>Nenhuma receita encontrada.</p>

<?php endif ?>

<?php require_once 'views\_footer.php' ?>