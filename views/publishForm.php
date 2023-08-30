<?php include 'views\_header.php'; ?>

<h2>Publicar receita</h2>

<div class="container">
    <form action="/" method="POST">
        <input type="hidden" name="action" value="publish">
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="title" class="form-control" maxlength="80" required>
        </div>
        <div class="form-group">
            <label for="conteudo">Receita</label>
            <textarea name="content" rows="10" class="form-control" maxlength="5000" required></textarea>
        </div>

        <div class="errors">
            <?php if (isset($_SESSION['errors']) && is_array($_SESSION['errors'])) {
                foreach ($_SESSION['errors'] as $error) {
                    echo '<p>' . $error . "<br>" . '</p>';
                }
                unset($_SESSION['errors']);
            }  ?>
        </div>

        <button style="margin-top: 30px;" type="submit" class="btn-custom">Publicar</button>
    </form>
</div>

<?php include 'views\_footer.php' ?>