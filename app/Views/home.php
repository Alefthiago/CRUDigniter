<!--    View PAI   -->
<?= $this->extend('master') ?>

<!--    Ponto inicial da renderização     -->
<?= $this->section('content') ?>
<h1>Bem-vindo&lpar;a&rpar;</h1>
<div>
    <p><?= var_dump(session('user'))?></p>
    <a href="<?= url_to('booksPage')?>" target="_self" rel="next">
        <button class="button-default" id="bCRUD" role="button">CRUD</button>
    </a>
    <a href="<?= url_to('logout')?>" target="_self" rel="next">
        <button class="button-default" id="bLogout" role="button">Sair</button>
    </a>
</div>

<?= $this->endSection() ?>
<!--    Ponto final da renderização     -->