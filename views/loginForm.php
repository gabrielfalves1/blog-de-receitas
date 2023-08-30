<?php $cssPath = "/views/css/form.css";
include 'views\_header.php'; ?>
<h2 class="text-center">Acesse</h2>

<div class="form d-flex justify-content-center align-items-center p-3">

    <form action="/" method="post">
        <input type="hidden" name="action" value="login">
        <div class="mb-3 ">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Senha</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <div class="errors">

        </div>

        <div class="options d-flex justify-content-between align-items-center">
            <button type="submit" class="btn-custom">Entrar</button>
            <a href="/user/register">Cadastre-se</a>
        </div>
    </form>


</div>

<?php include 'views\_footer.php' ?>