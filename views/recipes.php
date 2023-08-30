<?php include 'views\_header.php'; ?>

<h2>Postagens recentes</h2>

<?php foreach ($recipes as $recipe) {
    echo $recipe['title'];
} ?>

<?php include 'views\_footer.php' ?>