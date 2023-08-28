<?php

namespace App\Controllers;
//      Controller responsável pela VIEW home     //
class Home extends BaseController
{

    public function index()
    {
        return view('home');
    }
}
