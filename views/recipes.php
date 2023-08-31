<?php require_once 'views\_header.php'; ?>

<h2>Receitas Atualizadas</h2>



<div class="card-group ">
    <?php foreach ($recipes as $recipe) : ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $recipe['title'] ?></h5>
                <p class="card-text"><?php echo substr($recipe['content'], 0, 150) . '...' ?></p>
                <button class="btn-custom">Exibir mais</button>
            </div>
        </div>
    <?php endforeach; ?>
</div>


<?php require_once 'views\_footer.php' ?>