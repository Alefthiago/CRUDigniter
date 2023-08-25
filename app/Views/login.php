<!--    View PAI   -->
<?= $this->extend('master') ?>

<!--    Ponto incial da renderização    -->
<?= $this->section('content') ?>
<h1>Login</h1>
<form action=<?= $_SERVER["PHP_SELF"]?> method="post" class="formDefault">
    <input type="email" placeholder="E-mail" name="email" required>
    <input type="password" placeholder="Senha" name="senha" required>
    <input type="submit" value="Entrar">
    <!--    Redirecionamento para a pagina de cadastro      -->
    <p class="p"><a href="<?= url_to('registration') ?>">Criar conta</a></p>
</form>
<?= $this->endSection() ?>
<!--    Ponto final da renderização     -->