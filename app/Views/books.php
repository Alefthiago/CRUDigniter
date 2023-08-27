<!--    View PAI   -->
<?= $this->extend('master') ?>

<!--    Ponto inicial da renderização     -->
<?= $this->section('content') ?>
<h1>Adicionar Livro</h1>
<?php if (session()->has('error')) : ?>
    <span class="danger"><?= session()->getFlashdata('error') ?></span>
<?php endif ?>
<pre>
</pre>

<form action="<?= url_to('booksAdd') ?>" method="post" class="formDefault">
    <input type="text" placeholder="Título" name="title" required value="<?= old('title') ?>">
    <input type="text" placeholder="Autor" name="author" required value="<?= old('author') ?>">
    <input type="text" placeholder="Editora" name="publisher" required value="<?= old('publisher') ?>">
    <input type="text" placeholder="Link" name="link" required value="<?= old('link') ?>">
    <select name="genre" required>
        <option disabled selected hidden>Selecione um gênero</option>
        <option value="Biografia">Biografia</option>
        <option value="Ficção">Ficção</option>
        <option value="Outro">Outro</option>
    </select>
    <input type="submit" value="Adicionar">
</form>
<div>
    <button class="button-default" id="buttonBack" role="button">Voltar</button>
</div>
<h2 style="text-align: center;">Meus Livros</h2>
<div class="listBooks">
    <?php if ($books) : ?>
        <div>
            <h3>Ficção</h3>
            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Editora</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $book) : ?>
                        <tr>
                            <?php if ($book->BK_GENRE == 'Ficção') : ?>
                                <td>
                                    <?= $book->BK_TITLE ?>
                                </td>
                                <td>
                                    <?= $book->BK_AUTHOR ?>
                                </td>
                                <td>
                                    <?= $book->BK_PUBLISHER ?>
                                </td>
                                <td>
                                    <?= $book->BK_DESCRIPTION ?>
                                </td>
                                <td>
                                    <a href="<?= $book->BK_LINK?>">
                                        <button class="button-default">
                                            Ver livro
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="edit.php?id=">
                                        <button class="button-default">
                                            Editar
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="edit.php?id=">
                                        <button class="button-default">
                                            Remover
                                        </button>
                                    </a>
                                </td>
                            <?php endif ?>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
        <div>
            <h3>Biografia</h3>
            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Editora</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $book) : ?>
                        <tr>
                            <?php if ($book->BK_GENRE == 'Biografia') : ?>
                                <td>
                                    <?= $book->BK_TITLE ?>
                                </td>
                                <td>
                                    <?= $book->BK_AUTHOR ?>
                                </td>
                                <td>
                                    <?= $book->BK_PUBLISHER ?>
                                </td>
                                <td>
                                    <?= $book->BK_DESCRIPTION ?>
                                </td>
                                <td>
                                    <a href="<?= $book->BK_LINK?>">
                                        <button class="button-default">
                                            Ver livro
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="edit.php?id=">
                                        <button class="button-default">
                                            Editar
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="edit.php?id=">
                                        <button class="button-default">
                                            Remover
                                        </button>
                                    </a>
                                </td>
                            <?php endif ?>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div>
            <h3>Outro</h3>
            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Editora</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $book) : ?>
                        <tr>
                            <?php if ($book->BK_GENRE == 'Outro') : ?>
                                <td>
                                    <?= $book->BK_TITLE ?>
                                </td>
                                <td>
                                    <?= $book->BK_AUTHOR ?>
                                </td>
                                <td>
                                    <?= $book->BK_PUBLISHER ?>
                                </td>
                                <td>
                                    <?= $book->BK_DESCRIPTION ?>
                                </td>
                                <td>
                                    <a href="<?= $book->BK_LINK?>">
                                        <button class="button-default">
                                            Ver livro
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="edit.php?id=">
                                        <button class="button-default">
                                            Editar
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="edit.php?id=">
                                        <button class="button-default">
                                            Remover
                                        </button>
                                    </a>
                                </td>
                            <?php endif ?>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <?php endif ?>
</div>

<!--    Importando o funções em js para a  pagina   -->
<?= script_tag('/assets/javaScript/functions/books.js') ?>

<?= $this->endSection() ?>
<!--    Ponto final da renderização     -->