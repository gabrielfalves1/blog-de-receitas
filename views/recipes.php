<?php
$pageTitle = 'Receitas';
$cssPath = '/views/css/recipes.css';
require_once 'views\_header.php'; ?>

<h2>Receitas Atualizadas</h2>

<div class="card-group">
    <div class="row">
        <?php foreach ($recipes as $recipe) : ?>
            <div class="col-md-4 p-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $recipe['title'] ?></h5>
                        <p class="card-text"><?php echo substr($recipe['content'], 0, 150) . '...' ?></p>
                        <a href="/recipe/<?php echo $recipe['id'] ?>"><button class="btn-custom">Ver mais</button></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once 'views\_footer.php' ?>