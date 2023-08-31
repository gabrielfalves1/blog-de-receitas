<?php require_once 'views\_header.php'; ?>

<h2>Publicar receita</h2>

<div class="container">
    <form action="/recipe/store" method="POST">
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="title" class="form-control" maxlength="80" value="<?php echo isset($_POST['title']) ? $_POST['title'] : ''; ?>" required>
            <?php echo isset($msg['title']) ? '<div class="msg text-danger"><small>' . $msg['title'] . '</small></div>' : ''; ?>
        </div>
        <div class="form-group">
            <label for="conteudo">Receita</label>
            <textarea name="content" rows="10" class="form-control" maxlength="5000" value="<?php echo isset($_POST['content']) ? $_POST['content'] : ''; ?>" required></textarea>
            <?php echo isset($msg['content']) ? '<div class="msg text-danger"><small>' . $msg['content'] . '</small></div>' : ''; ?>
        </div>
        <?php echo isset($msg['all']) ? '<div class="msg text-danger"><small>' . $msg['all'] . '</small></div>' : ''; ?>
        <?php echo isset($msg['ok']) ? '<div class="msg text-success"><small>' . $msg['ok'] . '</small></div>' : ''; ?>

        <button style="margin-top: 30px;" type="submit" class="btn-custom">Publicar</button>
    </form>
</div>

<?php require_once 'views\_footer.php' ?>