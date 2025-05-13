<?php namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        helper(['form']);

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required|min_length[10]'
            ];

            if (!$this->validate($rules)) {
                return view('login', ['validation' => $this->validator]);
            }

            $model = new UserModel();
            $email = $this->request->getPost('email');
            $pass = md5($this->request->getPost('password'));

            $user = $model->where([
                'tuser_email' => $email,
                'tuser_pass' => $pass
            ])->first();

            if ($user) {
                session()->set([
                    'user_id' => $user['tuser_id'],
                    'email' => $user['tuser_email'],
                    'isLoggedIn' => true,
                    'last_activity' => time()
                ]);
                return redirect()->to('/users');
            } else {
                return view('login', ['error' => 'Credenciales inválidas']);
            }
        }

        return view('login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}