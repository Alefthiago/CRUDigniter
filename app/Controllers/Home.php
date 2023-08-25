<?php
    namespace App\Controllers;
    //      Controller responsavel pela pagina home do site
    class Home extends BaseController {

        public function index() {
            return view('home');
        }
    }