<!--    View PAI   -->
<?= $this->extend('master') ?>

<!--    Ponto inicial da renderização     -->
<?= $this->section('content') ?>

<h1>Editar</h1>

<?php if (session()->has('error')) : ?>
    <span class="danger"><?= session()->getFlashdata('error') ?></span>
<?php endif ?>

<form action="<?= url_to('booksUpdate') ?>" method="post" class="formDefault">
    <input type="hidden" name="id" value="<?= $book->BK_ID ?>">
    <label>Título</label>
    <input type="text" placeholder="Título" name="title" value="<?= $book->BK_TITLE ?? old('title') ?>">
    <label>Autor</label>
    <input type="text" placeholder="Autor" name="author" value="<?= $book->BK_AUTHOR ?? old('author') ?>">
    <label>Editora</label>
    <input type="text" placeholder="Editora" name="publisher" value="<?= $book->BK_PUBLISHER ?? old('publisher') ?>">
    <label>Link</label>
    <input type="text" placeholder="Link" name="link" required value="<?= $book->BK_LINK ?? old('link') ?>">
    <label>Descrição</label>
    <textarea name="description" placeholder="Descrição" id="" cols="30" rows="10"><?= $book->BK_DESCRIPTION ?? old('description') ?></textarea>
    <label>Genêro</label>
    <select name="genre" required>
        <option value="<?= $book->BK_GENRE ?>" hidden><?= $book->BK_GENRE ?? 'Selecione um gênero' ?></option>
        <option value="Biografia">Biografia</option>
        <option value="Ficção">Ficção</option>
        <option value="Outro">Outro</option>
    </select>
    <input type="submit" value="Alterar">
</form>

<a href="<?= url_to('booksPage') ?>">
    <button class="button-default" id="bVoltar">Voltar</button>
</a>

<?= $this->endSection() ?>
<!--    Ponto final da renderização     -->