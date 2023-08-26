<?php

namespace App\Controllers;

use App\Models\User as ModelUser;
//      Este CONTROLLER trata das VIEWS LOGIN E RISTRATION  //

class User extends BaseController
{

    public function index()
    {
        if(!session()->has('user')) {
            return view('login');
        } else {
            return redirect()->route('home');
        }
    }

    public function login()
    {
        //      Obtendo os dados enviados na request     //
        $data = (object) array(
            'US_EMAIL' => $this->request->getPost()['email'],
            'US_PASS' => $this->request->getPost()['pass']
        );
        try {
            $modalUser = new ModelUser();
            $userFound = $modalUser->select('US_EMAIL, US_PASS')
                ->where('US_EMAIL', $data->US_EMAIL)
                ->first();
            if (!$userFound or !password_verify($data->US_PASS, $userFound->US_PASS)) {
                return redirect()->route('loginPage')->with('error', 'Dados inválidos!');
            }
            //      Criando uma session com os dados do usuário salvando apenas o Email     //
            session()->set('user', $data->US_EMAIL);
            return redirect()->route('home');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return redirect()->route('registration')->with('error', ERRORMESSAGE);
        } catch (\Exception $e) {
            return redirect()->route('registration')->with('error', ERRORMESSAGE);
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->route('loginPage');
    }

    public function registration()
    {
        if(!session()->has('user')) {
            return view('registration');
        } else {
            return redirect()->route('home');
        }
    }
    
    public function created()
    {
        //      Inputs email, pass e confirmPass; São retornados como um array      //
        if ($this->request->getPost()['pass'] != $this->request->getPost()['confirmPass']) {
            return redirect()->route('registration')->with('error', 'As senhas devem ser iguais!');
        };

        $data = (object) array(
            'US_EMAIL' => $this->request->getPost()['email'],
            'US_PASS' => password_hash($this->request->getPost()['pass'], PASSWORD_ARGON2I)
        );
        // ERRORMESSAGE é uma constante criada com uma mensagem padrão para erros       //
        try {
            $modelUser = new ModelUser();
            $inserted = $modelUser->insert($data);
            if ($inserted) {
                session()->set('user', $data->US_EMAIL);
                return redirect()->route('home');
            } else {
                return redirect()->route('registration')->with('error', 'E-mail inválido!');
            }
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            if (preg_match('/duplicate/i', $e->getMessage(), $matches)) {
                return redirect()->route('registration')->with('error', 'E-mail inválido!');
            } else {
                return redirect()->route('registration')->with('error', ERRORMESSAGE);
            }
        } catch (\Exception $e) {
            return redirect()->route('registration')->with('error', ERRORMESSAGE);
        }
    }
}
