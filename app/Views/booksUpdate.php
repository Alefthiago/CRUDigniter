<!--    View PAI   -->
<?= $this->extend('master') ?>

<!--    Ponto inicial da renderização     -->
<?= $this->section('content') ?>
<h1>Editar</h1>
<?php if (session()->has('error')) : ?>
    <span class="danger"><?= session()->getFlashdata('error') ?></span>
<?php endif ?>
<form action="" method="post" class="formDefault">
    <input type="hidden" name="id" value="<?= $book->id ?>">
    <input type="text" placeholder="Título" name="title" value="<?= $book->title ?? old('title') ?>">
    <input type="text" placeholder="Autor" name="author" value="<?= $book->author ?? old('author')?>">
    <input type="text" placeholder="Editora" name="publisher" value="<?= $book->publisher ?? old('publisher')?>">
    <input type="text" placeholder="Link" name="link" required value="<?= $book->link ?? old('link') ?>">
    <textarea name="description" placeholder="Descrição" id="" cols="30" rows="10" ><?= $book->description ?? old('description') ?></textarea>
    <label>Genêro</label>
    <select name="genero" required>
        <option value="<?= $book->genre ?>" hidden><?= $book->genre ?? 'Selecione um gênero' ?></option>
        <option value="Biografia">Biografia</option>
        <option value="Ficção">Ficção</option>
        <option value="Não ficção">Não ficção</option>
    </select>
    <input type="submit" value="Alterar">
</form>
<a href="<?= url_to('booksPage')?>">
    <button class="button-default" id="bVoltar">Voltar</button>
</a>
<?= $this->endSection() ?>
<!--    Ponto final da renderização     -->