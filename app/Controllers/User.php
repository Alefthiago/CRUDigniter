<?php 
    namespace App\Controllers;
    use App\Models\User as ModelUser;
    //      Este CONTROLLER trata das VIEWS LOGIN E RISTRATION  //

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
            // Inputs email, pass e confirmPass; São retornados como um array; 
            $modelUser = new ModelUser();

            $data = [
                'US_EMAIL' => $this->request->getPost()['email'],
                'US_PASS'   => $this->request->getPost()['pass']
            ];
            try{
                $inserted = $modelUser->insert($data);

            } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
                if (preg_match('/duplicate/i', $e->getMessage(), $matches)) {
                    // A palavra "duplicate" foi encontrada
                    $duplicateWord = $matches[0];
                    echo $duplicateWord;
                }       
            }
    }
}