<?= $this->extend('master') ?>
<?= $this->section('content') ?>
<h1>Home</h1>
<div>
    <button class="button-default" id="bCRUD" role="button">CRUD</button>
    <button class="button-default" id="bLogout" role="button">Sair</button>
</div>

<?= script_tag('/assets/js/functions/logout.js') ?>
<?= $this->endSection() ?>