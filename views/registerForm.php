<?php include 'views\_header.php'; ?>

<h2 class="text-center">Cadastro</h2>

<div class="form d-flex justify-content-center align-items-center p-3">

    <form action="/user/store" method="post">

        <div class="mb-3 ">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" name="email">
            <?php echo isset($msg['email']) ? '<div class="msg text-danger"><small>' . $msg['email'] . '</small></div>' : ''; ?>
        </div>
        <div class="mb-3 ">
            <label class="form-label">Nome de usuário</label>
            <input type="text" class="form-control" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>" name="username" maxlength="15">
            <?php echo isset($msg['username']) ? '<div class="msg text-danger"><small>' . $msg['username'] . '</small></div>' : ''; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Senha</label>
            <input type="password" class="form-control" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>" name="password">
            <?php echo isset($msg['password']) ? '<div class="msg text-danger"><small>' . $msg['password'] . '</small></div>' : ''; ?>
        </div>
        <?php echo isset($msg['all']) ? '<div class="msg text-danger"><small>' . $msg['all'] . '</small></div>' : ''; ?>
        <?php echo isset($msg['ok']) ? '<div class="msg text-success"><small>' . $msg['ok'] . '</small></div>' : ''; ?>

        <div class="options d-flex justify-content-between align-items-center mt-2">
            <a href="/user/form"> <button type="button" class="btn-back">Voltar</button></a>
            <button type="submit" class="btn-custom">Cadastrar</button>
        </div>
    </form>


</div>

<?php include 'views\_footer.php' ?>