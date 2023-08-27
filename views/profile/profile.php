<?php
$pageTitle = "Perfil do Usuário";
require($_SERVER['DOCUMENT_ROOT'] . '/configuration/config.php');
$config = new Config();
$user = $config->checkAuth();
?>




<?php require($_SERVER['DOCUMENT_ROOT'] . '/views/_header.php'); ?>

<h2>Bem vindo <?php echo ($user->getUsername()) ?></h2>




<?php require($_SERVER['DOCUMENT_ROOT'] . '/views/_footer.php'); ?>