<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../views/css/global.css">
    <?php if (isset($cssPath)) echo '<link rel="stylesheet" href="' . $cssPath . '">' ?>
    <title> <?php if (isset($pageTitle)) echo $pageTitle ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-custom navbar-expand-sm fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Receitas Fáceis</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/recipe/index">Receitas</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">

                    <?php if (isset($_SESSION['logged_in'])) : ?>
                        <div class="dropdown">
                            <a style="color: #fff" class="nav-link dropdown-toggle" href="#" id="dropdownMenu2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $_SESSION['logged_in']['username'] ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <a class="dropdown-item" href="/profile">Meu perfil</a>
                                <a class="dropdown-item" href="/recipe/form">Publicar</a>
                                <a class="dropdown-item" href="/login/logout">Sair</a>
                            </div>
                        </div>
                    <?php else : ?>

                        <li class="nav-item">
                            <a class="nav-link" href="/login/form">Acessar</a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>


    <main>