<!--    View PAI   -->
<?= $this->extend('master') ?>

<!--    Ponto incial da renderização    -->
<?= $this->section('content') ?>
<h1>Entrar</h1>
<?php if (session()->has('error')) : ?>
    <span class="danger"><?= session()->getFlashdata('error') ?></span>
<?php endif ?>
<form action=<?= url_to('login') ?> method="post" class="formDefault">
    <input type="email" placeholder="E-mail" name="email" required value="<?= old('email') ?>">
    <input type="password" placeholder="Senha" name="pass" required value="<?= old('pass') ?>">
    <input type="submit" value="Entrar">
    <!--    Redirecionamento para a pagina de cadastro      -->
    <p class="p"><a href="<?= url_to('registrationPage') ?>" target="_self" rel="next">Criar conta</a></p>
</form>
<?= $this->endSection() ?>
<!--    Ponto final da renderização     -->