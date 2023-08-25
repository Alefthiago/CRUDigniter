<?= $this->extend('master') ?>

<?= $this->section('content') ?>
    <h1>Login</h1>
    <form action=<?= $_SERVER["PHP_SELF"]?> method="post" class="formDefault">
        <input type="email" placeholder="E-mail" name="email" required>
        <input type="password" placeholder="Senha" name="senha" required>
        <input type="submit" value="Entrar">
        <p class="p"><a href="<?= url_to('registration') ?>">Criar conta</a></p>
    </form>
<?= $this->endSection() ?>