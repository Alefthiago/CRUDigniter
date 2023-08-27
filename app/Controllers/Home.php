<?php

namespace App\Controllers;
//      Controller responsavel pela pagina home do site
class Home extends BaseController
{

    public function index()
    {
        //      Verificação de login do usuario      //
        if (session()->has('user')) {
            return view('home');
        } else {
            return redirect()->route('loginPage');
        }
    }
}
