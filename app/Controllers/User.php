<?php 
    namespace App\Controllers;
    use App\Models\User as ModelUser;

    class User extends BaseController {
        
        public function login() {
            return view('login');
        }

        public function logout() {
            return redirect()->to('/');
        }

        public function registration() {
            return view('registration');
        }

        public function created () {
            $user = new ModelUser();
        }
    }