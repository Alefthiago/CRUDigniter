<!--    View PAI   -->
<?= $this->extend('master') ?>

<!--    Ponto inicial da renderização     -->
<?= $this->section('content') ?>

<h1>Adicionar Livro</h1>

<?php if (session()->has('error')) : ?>
    <span class="danger"><?= session()->getFlashdata('error') ?></span>
<?php endif ?>

<form action="<?= url_to('booksAdd') ?>" method="post" class="formDefault">
    <input type="text" placeholder="Título" name="title" required value="<?= old('title') ?>">
    <input type="text" placeholder="Autor" name="author" required value="<?= old('author') ?>">
    <input type="text" placeholder="Editora" name="publisher" required value="<?= old('publisher') ?>">
    <input type="text" placeholder="Link" name="link" required value="<?= old('link') ?>">
    <textarea name="description" placeholder="Descrição" id="" cols="30" rows="10" value="<?= old('description') ?>"></textarea>
    <select name="genre" required>
        <option disabled selected hidden>Selecione um gênero</option>
        <option value="Biografia">Biografia</option>
        <option value="Ficção">Ficção</option>
        <option value="Outro">Outro</option>
    </select>
    <input type="submit" value="Adicionar">
</form>

<div>
    <a href="<?= url_to('homePage') ?>" target="_self">
        <button class="button-default" id="buttonBack" role="button">Voltar</button>
    </a>
</div>

<h2 style="text-align: center;">Meus Livros</h2>

<div class="listBooks">
    <!--    Verificando se o usuário possui registros    -->
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
                    <!--    Interando em um objeto que contem os livros registrados pelo usuário   -->
                    <?php foreach ($books as $book) : ?>
                        <tr>
                            <!--    Verificando o gênero do livro   -->
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
                                    <a href="<?= $book->BK_LINK ?>" target="_blank" rel="external">
                                        <button class="button-default">
                                            Ver livro
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <!--     Realiza um request do tipo GET para carregar os dados do livro referente no formulado de atualização    -->
                                    <a href="<?= url_to(
                                                    'booksUpdate',
                                                    $book->BK_ID,
                                                    $book->BK_TITLE,
                                                    $book->BK_AUTHOR,
                                                    $book->BK_PUBLISHER,
                                                    $book->BK_DESCRIPTION,
                                                    $book->BK_LINK,
                                                    $book->BK_GENRE
                                                ) ?>">
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
                    <!--    Interando em um objeto que contem os livros registrados pelo usuário   -->
                    <?php foreach ($books as $book) : ?>
                        <tr>
                            <!--    Verificando o gênero do livro   -->
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
                                    <a href="<?= $book->BK_LINK ?>" target="_blank" rel="external">
                                        <button class="button-default">
                                            Ver livro
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <!--     Realiza um request do tipo GET para carregar os dados do livro referente no formulado de atualização    -->
                                    <a href="<?= url_to(
                                                    'booksUpdate',
                                                    $book->BK_ID,
                                                    $book->BK_TITLE,
                                                    $book->BK_AUTHOR,
                                                    $book->BK_PUBLISHER,
                                                    $book->BK_DESCRIPTION,
                                                    $book->BK_LINK,
                                                    $book->BK_GENRE
                                                ) ?>">
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
                    <!--    Interando em um objeto que contem os livros registrados pelo usuário   -->
                    <?php foreach ($books as $book) : ?>
                        <tr>
                            <!--    Verificando o gênero do livro   -->
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
                                    <a href="<?= $book->BK_LINK ?>" target="_blank" rel="external">
                                        <button class="button-default">
                                            Ver livro
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <!--     Realiza um request do tipo GET para carregar os dados do livro referente no formulado de atualização    -->
                                    <a href="<?= url_to(
                                                    'booksUpdate',
                                                    $book->BK_ID,
                                                    $book->BK_TITLE,
                                                    $book->BK_AUTHOR,
                                                    $book->BK_PUBLISHER,
                                                    $book->BK_DESCRIPTION,
                                                    $book->BK_LINK,
                                                    $book->BK_GENRE
                                                ) ?>">
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

<?= $this->endSection() ?>
<!--    Ponto final da renderização     -->