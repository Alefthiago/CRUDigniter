<?php

namespace App\Controllers;

use App\Models\Books as ModelBooks;
use App\Models\UsHasBk;

class Books extends BaseController
{
    //      Este CONTROLLER trata das VIEWS BOOKS E BOOKSUPDATE      //

    //      ERRORMESSAGE é uma constante criada com uma mensagem padrão para erros       //
    public function index()
    {
        //      Verificação de login do usuario      //
        if (session()->has('user')) {
            $userId = session('user')->id;
            try {
                $modelBooks = new ModelBooks();
                //      Consulta os livros relacionados ao usuário       //
                $userBooks = $modelBooks->join('US_HAS_BK', 'US_HAS_BK.UHB_BK = IG_BOOKS.BK_ID')
                    ->where('US_HAS_BK.UHB_US', $userId)
                    ->findAll();
                return view('books', ['books' => $userBooks]);
            } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
                //      Tratamento de erros em geral que tenham relação com o banco     //
                return redirect()->route('booksPage')
                    ->with('error', ERRORMESSAGE)
                    ->withInput();
            } catch (\Exception $e) {
                //      Tratamento de erros em geral        //
                return redirect()->route('booksPage')
                    ->with('error', ERRORMESSAGE)
                    ->withInput();
            }
        } else {
            return redirect()->route('loginPage');
        }
    }


    public function create()
    {
        //      Recuperando dados do request    //
        $data = (object) array(
            'BK_TITLE' => $this->request->getPost('title'),
            'BK_AUTHOR' => $this->request->getPost('author'),
            'BK_PUBLISHER' => $this->request->getPost('publisher'),
            'BK_GENRE' => $this->request->getPost('genre'),
            'BK_LINK' => $this->request->getPost('link'),
            'BK_DESCRIPTION' => $this->request->getPost('description'),
            'US_ID' => session('user')->id
        );
        try {
            $modelBooks = new ModelBooks();
            $inserted = $modelBooks->insert($data);
            if ($inserted) {
                $UHB = new UsHasBk();
                $userId = session('user')->id;
                $UHB->insert([
                    'UHB_BK' => $inserted,
                    'UHB_US' => $userId
                ]);
                return redirect()->route('booksPage');
            } else {
                return redirect()->route('booksPage')
                    ->with('error', ERRORMESSAGE)
                    ->withInput();
            }
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            //      Se o registro já existir no banco        //
            if (preg_match('/duplicate/i', $e->getMessage(), $matches)) {
                return redirect()->route('booksPage')
                    ->with('error', 'Livro já adicionado!')
                    ->withInput();
            } else {
                //      Tratamento de erros em geral que tenham relação com o banco     //
                return redirect()->route('booksPage')
                    ->with('error', ERRORMESSAGE . $e->getMessage())
                    ->withInput();
            }
        } catch (\Exception $e) {
            //      Tratamento de erros em geral        //
            return redirect()->route('booksPage')
                ->with('error', ERRORMESSAGE . $e->getMessage())
                ->withInput();
        }
    }

    public function read()
    {
    }

    public function updatePage($id, $title, $author, $publisher, $description, $link, $genre)
    {
        $data = (object) array(
            'id' => $id,
            'title' => $title,
            'author' => $author,
            'publisher' => $publisher,
            'description' => $description,
            'link' => $link,
            'genre' => $genre
        );
        //      Passando os dados do livro para a VIEW      //
        return view('booksUpdate', ['book' => $data]);
    }

    public function delete()
    {
    }
}
