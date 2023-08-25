<?= $this->extend('master') ?>

<?= $this->section('content') ?>

<h1>Cadastro </h1>
<form action="<?= url_to('createdUser')?>" method="post" class="formDefault">
    <input type="email" placeholder="E-mail" name="email" required>
    <input type="password" placeholder="Senha" name="senha" required>
    <input type="password" placeholder="Confirmar Senha" name="ConfirmarSenha" required>
    <input type="submit" value="Criar">
    <p class="p"><a href="<?= url_to('login') ?>">Fazer login</a></p>
</form>
<?= $this->endSection() ?>