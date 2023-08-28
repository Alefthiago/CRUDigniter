<?php

namespace App\Controllers;

use App\Models\Books as ModelBooks;
use App\Models\UsHasBk as ModelUsHasBk;
//      Controller responsável pelas VIEWS BOOKS e BOOKSUPDATE     //
class Books extends BaseController
{
    //      Este CONTROLLER trata das VIEWS BOOKS E BOOKSUPDATE      //

    //      ERRORMESSAGE é uma constante criada com uma mensagem padrão para erros       //
    public function index()
    {
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
                return redirect()->route('booksPage')->with('message', SUCCESSMESSAGE);
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
                    ->with('error', ERRORMESSAGE )
                    ->withInput();
            }
        } catch (\Exception $e) {
            //      Tratamento de erros em geral        //
            return redirect()->route('booksPage')
                ->with('error', ERRORMESSAGE )
                ->withInput();
        }
    }

    public function updatePage()
    {
        $data = (object) array(
            'BK_ID' => $this->request->getPost('id'),
            'BK_TITLE' => $this->request->getPost('title'),
            'BK_AUTHOR' => $this->request->getPost('author'),
            'BK_PUBLISHER' => $this->request->getPost('publisher'),
            'BK_GENRE' => $this->request->getPost('genre'),
            'BK_LINK' => $this->request->getPost('link'),
            'BK_DESCRIPTION' => $this->request->getPost('description'),
        );
        //      Passando os dados do livro para a VIEW      //
        return view('booksUpdate', ['book' => $data]);
    }

    public function update()
    {
        //      Recuperando dados do request    //
        $bookId = $this->request->getPost('id');
        $data = [
            'BK_TITLE' => $this->request->getPost('title'),
            'BK_AUTHOR' => $this->request->getPost('author'),
            'BK_PUBLISHER' => $this->request->getPost('publisher'),
            'BK_GENRE' => $this->request->getPost('genre'),
            'BK_DESCRIPTION' => $this->request->getPost('description'),
            'BK_LINK' => $this->request->getPost('link'),
        ];
        try {
            $modelBooks = new ModelBooks();
            $updated = $modelBooks->update($bookId, $data);
            if ($updated) {
                return redirect()->route('booksPage')->with('message', SUCCESSMESSAGE);
            } else {
                return redirect()->route('booksUpdatePage')
                    ->with('error', ERRORMESSAGE)
                    ->withInput();
            }
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
    }

    public function delete()
    {
        try {
            $modelBooks = new ModelBooks();
            $UHB = new ModelUsHasBk();
            //      Apagando o registro da tabela US_HAS_BK que contem a relação do usuário com o livro     // 
            $deletedUsHasBk = $UHB->where([
                'UHB_BK' => $this->request->getPost('id'),
                'UHB_US' => session('user')->id
            ])->delete();
            $deletedBook = $modelBooks->delete($this->request->getPost('id'));
            if ($deletedBook && $deletedUsHasBk) {
                return redirect()->route('booksPage')->with('message', SUCCESSMESSAGE);
            }
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            //      Tratamento de erros em geral que tenham relação com o banco     //
            return redirect()->route('booksPage',)
                ->with('error', ERRORMESSAGE . $e->getMessage())
                ->withInput();
        } catch (\Exception $e) {
            //      Tratamento de erros em geral        //
            return redirect()->route('booksPage')
                ->with('error', ERRORMESSAGE . $e->getMessage())
                ->withInput();
        }
    }
}
