<!--    View PAI   -->
<?= $this->extend('master') ?>

<!--    Ponto inicial da renderização     -->
<?= $this->section('content') ?>
<h1>Bem-vindo&lpar;a&rpar;</h1>
<div>
    <p><?= var_dump(session('user'))?></p>
    <button class="button-default" id="bCRUD" role="button">CRUD</button>
    <button class="button-default" id="bLogout" role="button">Sair</button>
</div>

<!--    Importando o funções em js para a  pagina   -->
<?= script_tag('/assets/javaScript/functions/home.js') ?>

<?= $this->endSection() ?>
<!--    Ponto final da renderização     -->