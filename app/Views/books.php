<!--    View PAI   -->
<?= $this->extend('master') ?>

<!--    Ponto inicial da renderização     -->
<?= $this->section('content') ?>

<h1>Adicionar Livro</h1>

<?php if (session()->has('error')) : ?>
    <span class="danger"><?= session()->getFlashdata('error') ?></span>
<?php endif ?>

<?php if (session()->has('message')) : ?>
    <span class="message"><?= session()->getFlashdata('message') ?></span>
<?php endif ?>


<form action="<?= url_to('booksAdd') ?>" method="post" class="formDefault">
    <label>Título</label>
    <input type="text" placeholder="Título" name="title" required value="<?= old('title') ?>">
    <label>Autor</label>
    <input type="text" placeholder="Autor" name="author" required value="<?= old('author') ?>">
    <label>Editora</label>
    <input type="text" placeholder="Editora" name="publisher" required value="<?= old('publisher') ?>">
    <label>Link</label>
    <input type="text" placeholder="Link" name="link" required value="<?= old('link') ?>">
    <label>Descrição</label>
    <textarea name="description" placeholder="Descrição" id="" cols="30" rows="10" value="<?= old('description') ?>" required></textarea>
    <label>Genêro</label>
    <select name="genre">
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
                                    <form action="<?= url_to('booksUpdatePage') ?>" method="post">
                                        <input type="hidden" name="id" value="<?= $book->BK_ID ?>">
                                        <input type="hidden" name="title" value="<?= $book->BK_TITLE ?>">
                                        <input type="hidden" name="author" value="<?= $book->BK_AUTHOR ?>">
                                        <input type="hidden" name="publisher" value="<?= $book->BK_PUBLISHER ?>">
                                        <input type="hidden" name="description" value="<?= $book->BK_DESCRIPTION ?>">
                                        <input type="hidden" name="link" value="<?= $book->BK_LINK ?>">
                                        <input type="hidden" name="genre" value="<?= $book->BK_GENRE ?>">
                                        <button class="button-default">
                                            Editar
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="<?= url_to('booksDelete') ?>" method="post">
                                        <input type="hidden" name="id" value="<?= $book->BK_ID ?>">
                                        <button class="button-default">
                                            Remover
                                        </button>
                                    </form>
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
                                    <form action="<?= url_to('booksUpdatePage') ?>" method="post">
                                        <input type="hidden" name="id" value="<?= $book->BK_ID ?>">
                                        <input type="hidden" name="title" value="<?= $book->BK_TITLE ?>">
                                        <input type="hidden" name="author" value="<?= $book->BK_AUTHOR ?>">
                                        <input type="hidden" name="publisher" value="<?= $book->BK_PUBLISHER ?>">
                                        <input type="hidden" name="description" value="<?= $book->BK_DESCRIPTION ?>">
                                        <input type="hidden" name="link" value="<?= $book->BK_LINK ?>">
                                        <input type="hidden" name="genre" value="<?= $book->BK_GENRE ?>">
                                        <button class="button-default">
                                            Editar
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="<?= url_to('booksDelete') ?>" method="post">
                                        <input type="hidden" name="id" value="<?= $book->BK_ID ?>">
                                        <button class="button-default">
                                            Remover
                                        </button>
                                    </form>
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
                                    <form action="<?= url_to('booksUpdatePage') ?>" method="post">
                                        <input type="hidden" name="id" value="<?= $book->BK_ID ?>">
                                        <input type="hidden" name="title" value="<?= $book->BK_TITLE ?>">
                                        <input type="hidden" name="author" value="<?= $book->BK_AUTHOR ?>">
                                        <input type="hidden" name="publisher" value="<?= $book->BK_PUBLISHER ?>">
                                        <input type="hidden" name="description" value="<?= $book->BK_DESCRIPTION ?>">
                                        <input type="hidden" name="link" value="<?= $book->BK_LINK ?>">
                                        <input type="hidden" name="genre" value="<?= $book->BK_GENRE ?>">
                                        <button class="button-default">
                                            Editar
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="<?= url_to('booksDelete') ?>" method="post">
                                        <input type="hidden" name="id" value="<?= $book->BK_ID ?>">
                                        <button class="button-default">
                                            Remover
                                        </button>
                                    </form>
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