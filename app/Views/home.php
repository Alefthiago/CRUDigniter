<!--    View PAI   -->
<?= $this->extend('master') ?>

<!--    Ponto inicial da renderização     -->
<?= $this->section('content') ?>
<h1>Bem-vindo&lpar;a&rpar;</h1>
<div>
    <p><?= session('user') ?></p>
    <button class="button-default" id="bCRUD" role="button">CRUD</button>
    <button class="button-default" id="bLogout" role="button">Sair</button>
</div>
<!--    Importando o js para executar o logout do usuário   -->
<?= script_tag('/assets/js/functions/logout.js') ?>
<?= $this->endSection() ?>
<!--    Ponto final da renderização     -->