<?php

namespace App\Controllers;

use App\Models\Books as ModelBooks;

class Books extends BaseController
{

    public function index()
    {
        if (session()->has('user')) {
            //      Verificação de login do usuario      //
            try {
                $modelBooks = new ModelBooks();
                $findAll = $modelBooks->findAll();
                return view('books', ['books' => $findAll]);
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
            'BK_LINK' => $this->request->getPost('link')
        );
        try {
            $modelBooks = new ModelBooks();
            $inserted = $modelBooks->insert($data);
            if ($inserted) {
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
