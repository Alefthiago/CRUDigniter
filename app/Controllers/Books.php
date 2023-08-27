<?php

namespace App\Controllers;

use App\Models\Books as ModelBooks;
use App\Models\UsHasBk;

class Books extends BaseController
{
    public function index()
    {
        //      Verificação de login do usuario      //
        if (session()->has('user')) {
            $userId = session('user')->id;
            try {
                $modelBooks = new ModelBooks();
                // Consulta os livros relacionados ao usuário
                $userBooks = $modelBooks
                    ->join('US_HAS_BK', 'US_HAS_BK.UHB_BK = IG_BOOKS.BK_ID')
                    ->where('US_HAS_BK.UHB_US', $userId)
                    ->findAll();

                return view('books', ['books' => $userBooks]);
            } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
                return redirect()->route('booksPage')
                    ->with('error', ERRORMESSAGE)
                    ->withInput();
            } catch (\Exception $e) {
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
            'BK_DESCRIPTION' => $this->request->getPost('description')
        );
        try {
            $modelBooks = new ModelBooks();
            $inserted = $modelBooks->insert($data);
            if ($inserted) {
                $UHB = new UsHasBk();
                $user_id = session('user')->id;
                $UHB->insert([
                    'UHB_BK' => $inserted,
                    'UHB_US' => $user_id
                ]);
                return redirect()->route('booksPage');
            } else {
                return redirect()->route('booksPage')
                    ->with('error', ERRORMESSAGE)
                    ->withInput();
            }
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return redirect()->route('booksPage')
                ->with('error', ERRORMESSAGE)
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->route('booksPage')
                ->with('error', ERRORMESSAGE)
                ->withInput();
        }
    }

    public function read()
    {
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}
