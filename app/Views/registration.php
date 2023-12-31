<!--    View PAI   -->
<?= $this->extend('master') ?>

<!--    Ponto incial da renderização     -->
<?= $this->section('content') ?>

<h1>Cadastro </h1>

<?php if (session()->has('error')) : ?>
    <span class="danger"><?= session()->getFlashdata('error') ?></span>
<?php endif ?>

<form action="<?= url_to('registration') ?>" method="post" class="formDefault">
    <input type="email" placeholder="E-mail" name="email" required value="<?= old('email') ?>">
    <input type="password" placeholder="Senha" name="pass" required value="<?= old('pass') ?>">
    <input type="password" placeholder="Confirmar Senha" name="confirmPass" required value="<?= old('confirmPass') ?>">
    <input type="submit" value="Criar">
    <p class="p"><a href="<?= url_to('loginPage') ?>">Fazer login</a></p>
</form>

<?= $this->endSection() ?>
<!--    Ponto final da renderização     -->