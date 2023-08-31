<?php $cssPath = "/views/css/form.css";
require_once 'views\_header.php'; ?>
<h2 class="text-center">Acesse</h2>

<div class="form d-flex justify-content-center align-items-center p-3">

    <form action="/login/auth" method="post">
        <div class="mb-3 ">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" name="email" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Senha</label>
            <input type="password" class="form-control" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>" name="password" required>
        </div>

        <?php echo isset($msg['all']) ? '<div class="msg text-danger"><small>' . $msg['all'] . '</small></div>' : ''; ?>
        <?php echo isset($msg['ok']) ? '<div class="msg text-success"><small>' . $msg['ok'] . '</small></div>' : ''; ?>

        <div class="options d-flex justify-content-between align-items-center">
            <button type="submit" class="btn-custom">Entrar</button>
            <a href="/user/register">Cadastre-se</a>
        </div>
    </form>


</div>

<?php require_once 'views\_footer.php' ?>